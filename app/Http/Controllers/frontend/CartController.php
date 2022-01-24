<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Razorpay\Api\Api;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //adding product to cart
    public function add_to_cart(Request $request)
    {
        $cart = [];
        $minutes = 60 * 24 * 30;
        $user = auth()->user();
        $existCookie = false;
        $product = DB::table('products')->select('item_shade_name','status','flag','ecom')->where('id', $request->product_id)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->first();
        if ($product->status == 0 || $product->flag == 1 || $product->ecom == 'OFFLINE') {
            $message = "";
            return response($message);
        }

        if ($user) {
            $cartItems = DB::table('carts')->where('user_id', $user->id)->where('product_id', $request->product_id)->first();

            if ($cartItems) {
                //update data
                Cart::where('id', $cartItems->id)
                    ->update(['quantity' =>  $cartItems->quantity + $request->product_quantity]);
            } else {
                // Insert data
                $CartTable = new Cart;
                $CartTable->product_id = $request->product_id;
                $CartTable->user_id = $user->id;
                $CartTable->quantity = $request->product_quantity;
                $CartTable->save();
            }
        } else {
            if ($request->hasCookie('makeup_biography')) {
                $cartItems = json_decode(request()->cookie('makeup_biography'));

                foreach ($cartItems  as $cartItem) {
                    if ($cartItem->product_id == $request->product_id) {
                        $cartItem->quantity += $request->product_quantity;
                        $existCookie = true;
                    }
                    $cart[] = ['product_id' => $cartItem->product_id, 'quantity' => $cartItem->quantity];
                }
                if (!$existCookie) {
                    $cart[] = ['product_id' => $request->product_id, 'quantity' => $request->product_quantity];
                }
            } else {
                $cart[] = ['product_id' => $request->product_id, 'quantity' => $request->product_quantity];
            }
            $array_json = json_encode($cart);
            \Cookie::queue('makeup_biography', $array_json, $minutes);
        }

        $message = $product->item_shade_name. " has been added to your cart.";
        return response($message);
    }

    //getting list of cart items of loged in user
    public function list()
    {
        $user = auth()->user();
        $cartItems = [];
        $cookieItems = [];
        $cookieCartItems = [];
        $totalCartItems = 0;
        $totalQuantityItems = 0;
        $subtotal = 0.00;
        $discountPrice = 0.00;
        $totalPrice = 0.00;
        if ($user) {
            DB::table('users')->where('id', auth()->user()->id)->update(['auto_page' => 'cart', 'auto_email' => 0, 'auto_datetime' => date('y-m-d H:i:s')]);
            $cartItems = Cart::where('user_id', $user->id)->with([
                'product' => function ($query) {
                    $query->where(['status' => 1, 'flag' => 0]);
                },
                'product.medias'
            ])->get();

            $totalQuantityItems = DB::table('carts')->where('user_id', $user->id)->sum('quantity');
            if ($cartItems) {
                foreach ($cartItems as $vari) {
                    if (DB::table('products')->where(['id' => $vari->product_id,'status' => 0,'flag' => 1, 'ecom' => 'ONLINE'])->first()) {
                        DB::table('carts')->where(['product_id' => $vari->product_id, 'user_id' => $vari->user_id])->delete();
                    } else {
                        $subtotal += round(floatval($vari->product->sale_price) * $vari->quantity);
                        if ($vari->product->discount > 0) {
                            $discountPrice = round(floatval(floatval($vari->product->regular_price) * $vari->quantity) - floatval(floatval($vari->product->sale_price) * $vari->quantity));
                        }
                    }
                    $totalCartItems = count($cartItems);
                }
            }
        } else {
            $minutes = 60;

            if (request()->hasCookie('makeup_biography')) {
                $cartItems = json_decode(request()->cookie('makeup_biography'));
                foreach ($cartItems  as $cartItem) {
                    if (!empty(DB::table('products')->where(['id' => $cartItem->product_id,'status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->first())) {
                        $product = DB::table('products')->where(['id' => $cartItem->product_id,'status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->first();
                        $subtotal += $product->sale_price;
                        $cart[] = ['product_id' => $cartItem->product_id, 'quantity' => $cartItem->quantity];
                    }else{
                        $message = "";
                        return response($message);
                    }
                }
            }

            if (empty($cart)) {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            } else {
                $array_json = json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }

            if (request()->cookie('makeup_biography')) {
                $cookieItems = json_decode(request()->cookie('makeup_biography'));
                $totalCartItems = count($cookieItems);
                foreach ($cookieItems as $cookieItem) {
                    if ($cookieItem->product_id) {
                        $cookie_product = Product::with('medias')->where([
                            ['products.status', '=', 1],
                            ['products.id', '=', $cookieItem->product_id],
                            ['products.flag', '=', 0]
                        ])->first();
                        $totalQuantityItems += $cookieItem->quantity;
                        if ($cookie_product != "") {
                            $cookieCartItems[] = ['quantity' => $cookieItem->quantity, 'product' => $cookie_product];
                        }
                    }
                }
            }
            $cartItems = []; 
        }

        if (request()->ajax()) {
            $data = [];
            $listItem = "";
            if($user) {
                if (count($cartItems) > 0) {
                    $cartItems = $cartItems->take(3);
                }
                if (count($cartItems) > 0) {
                    foreach ($cartItems as $item) {
                        $listItem .= $this->list_items($item);
                    }
                    $data['totalQuantityItems'] = $totalQuantityItems;
                    $data['listItem'] = $listItem;
                }
            } else { 
                if (count($cookieCartItems) > 0) {                    
                    if (count($cookieCartItems) > 0) {
                        foreach ($cookieCartItems as $cookie_item) {
                            $listItem .= $this->cookie_items($cookie_item);
                        }
                    }

                    $data['totalQuantityItems'] = $totalQuantityItems;
                    $data['listItem'] = $listItem;
                }
            }    
            return response()->json($data);
        }

        $totalPrice = $subtotal;

        return view('frontend.cart.index', compact('cartItems', 'cookieCartItems', 'totalCartItems', 'subtotal', 'discountPrice', 'totalPrice'));
    }

    //html cookie item for html page from cookie
    public function cookie_items($product)
    {
        $product = $product['product'];
        $product_image = "";
        if (DB::table('product_media')->where(['product_id' => $product->id, 'media_type' => 'image'])->where('flag', 0)->orderby('sequence', 'asc')->first()) {
            $pro_img = DB::table('product_media')->where(['product_id' => $product->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
            $product_image = asset('storage/products/variants/' . $pro_img->media);
        }

        // $image = asset('storage/product/'.$product->);
        $removeItem = url('remove/cart/item', ['id' => $product['product']->id]);
        $item = '<li class="woocommerce-mini-cart-item c-product-list-widget__item mini_cart_item">
                    <div class="c-product-list-widget__wrap">
                        <div class="c-product-list-widget__thumb-col">
                            <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/"><img width="115" height="115" src="' . $product_image . '" class="c-product-list-widget__thumb" alt="" loading="lazy" srcset="' . $product_image . '" sizes="(max-width: 115px) 100vw, 115px"></a>					
                        </div>
                        <div class="c-product-list-widget__title-col">
                            <div class="c-product-list-widget__title">
                                ' . $product['product']['item_shade_name'] . '								
                            </div>
                            <div class="c-product-list-widget__price">
                                <span class="quantity">' . $product['quantity'] . ' × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>' . $product->sale_price . '</bdi></span></span>								
                            </div>
                        </div>
                        <button data-remove-url="' . $removeItem . '" class="remove-product-drop c-product-list-widget__remove remove" aria-label="Remove this item"><i class="ip-close-small c-product-list-widget__remove-icon"></i></button>						
                    </div>
                </li>';

        return $item;
    }

    //html list item for html page from cart db
    public function list_items($product)
    {
        $removeItem = url('remove/cart/item', ['id' => $product->id]);
        $product_image = "";
        if (DB::table('product_media')->where(['product_id' => $product->id, 'media_type' => 'image'])->where('flag', 0)->orderby('sequence', 'asc')->first()) {
            $pro_img = DB::table('product_media')->where(['product_id' => $product->id, 'media_type' => 'image'])->orderby('sequence', 'asc')->first();
            $product_image = asset('storage/products/variants/' . $pro_img->media);
        }

        $item = '<li class="woocommerce-mini-cart-item c-product-list-widget__item mini_cart_item">
                    <div class="c-product-list-widget__wrap">
                        <div class="c-product-list-widget__thumb-col">
                            <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/"><img width="115" height="115" src="' . $product_image . '" class="c-product-list-widget__thumb" alt="" loading="lazy" srcset="' . $product_image . '" sizes="(max-width: 115px) 100vw, 115px"></a>					
                        </div>
                        <div class="c-product-list-widget__title-col">
                            <div class="c-product-list-widget__title">
                                ' . $product->product->item_shade_name . '								
                            </div>
                            <div class="c-product-list-widget__price">
                                <span class="quantity">' . $product->quantity . ' × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>' . $product->sale_price . '</bdi></span></span>								
                            </div>
                        </div>
                        <button data-remove-url="' . $removeItem . '" class="remove-product-drop c-product-list-widget__remove remove" aria-label="Remove this item"><i class="ip-close-small c-product-list-widget__remove-icon"></i></button>						
                    </div>
                </li>';

        return $item;
    }

    //remove item form cart
    public function remove_item(Request $request, $id)
    {
        $user = auth()->user();
        $cartItem = DB::table('carts')->where('id', $id)->first();
        $minutes = 60;
        if ($user) {
            if (!empty($cartItem) && $cartItem->user_id == auth()->user()->id) {
                DB::table('carts')->where('id', $id)->delete();
                if (request()->ajax()) {
                    return response()->json(['status' => 200]);
                }
                return redirect()->back()->with('success', 'Item has been removed form cart');
            }
        } else {
            if ($request->hasCookie('makeup_biography')) {
                $cartItems = json_decode(request()->cookie('makeup_biography'));

                foreach ($cartItems  as $cartItem) {
                    if ($cartItem->product_id != $id) {
                        $cart[] = ['product_id' => $id, 'quantity' => $cartItem->quantity];
                    }
                }
            }
            if (empty($cart)) {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            } else {
                $array_json = json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }
            return response()->json(['status' => 200]);
        }
        return redirect()->back();
    }

    //update cart items 
    public function update_items(Request $request)
    {
        $user = auth()->user();
        $minutes = 60;
        if ($user) {
            if (count($request->cart_id) > 0) {
                foreach ($request->cart_id as $key => $item) {
                    if ($request->quantity[$key] == 0) {
                        DB::table('carts')->where('id', $item)->delete();
                    }
                    DB::table('carts')->where('id', $item)->update(['quantity' => $request->quantity[$key]]);
                }
            }
        } else {
            if ($request->hasCookie('makeup_biography')) {
                $cartItems = json_decode(request()->cookie('makeup_biography'));
                $cartItems = collect($cartItems);
                foreach ($request->product_id as $key => $p_id) {
                    if ($cartItems->where(['product_id' => $p_id])) {
                        if ($request->quantity[$key] != 0) {
                            $cart[] = ['product_id' => $p_id, 'quantity' => $request->quantity[$key]];
                        }
                    }
                }
            }
            if (empty($cart)) {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            } else {
                $array_json = json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }
        }
        return redirect('cart')->with('success', 'Cart Updated');
    }
    
    //New Update Function 
    // public function update_cart_items(Request $request) 
    // {
    //     $user = auth()->user();
    //     $minutes = 60;
    //     if ($user) {
    //         Cart::where('id', $request->cart_id)->update(['quantity' => $request->qty]);
    //         return response()->json(['status' => 200]);
    //     }
    //     else {
    //         if ($request->hasCookie('makeup_biography')) {
    //             $cartItems = json_decode(request()->cookie('makeup_biography'));
    //             $cartItems = collect($cartItems);
    //             foreach($cartItems as $cat) {
    //                 if($cat->product_id ==  $request->product_id && $cat->product_variant_id == $request->product_variant_id) {
    //                     $cart[] = ['product_id' => $cat->product_id, 'quantity' => $request->qty, 'product_variant_id' => $cat->product_variant_id];
    //                 } else {
    //                     $cart[] = ['product_id' => $cat->product_id, 'quantity' => $cat->quantity, 'product_variant_id' => $cat->product_variant_id];
    //                 }
    //             }
    //         }
    //         if (empty($cart)) {
    //             \Cookie::queue(\Cookie::forget('makeup_biography'));
    //         } else {
    //             $array_json = json_encode($cart);
    //             \Cookie::queue('makeup_biography', $array_json, $minutes);
    //         }
    //         return response()->json(['status' => 200]);
    //     }
    // }

    //New Update Function 
    public function update_cart_items(Request $request) 
    {
        $user = auth()->user();
        $minutes = 60;
        if ($user) {
            DB::table('carts')->where('id', $request->cart_id)->update(['quantity' => $request->qty]);
            return response()->json(['status' => 200]);
        }
        else {
            if ($request->hasCookie('makeup_biography')) {
                $cartItems = json_decode(request()->cookie('makeup_biography'));
                $cartItems = collect($cartItems);
                foreach($cartItems as $cat) {
                    if($cat->product_id ==  $request->product_id) {
                        $cart[] = ['product_id' => $cat->product_id, 'quantity' => $request->qty];
                    } else {
                        $cart[] = ['product_id' => $cat->product_id, 'quantity' => $cat->quantity];
                    }
                }
            }
            if (empty($cart)) {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            } else {
                $array_json = json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }
            return response()->json(['status' => 200]);
        }
    }

    //checkout function
    public function checkout(Request $request)
    {

        DB::table('users')->where('id', auth()->user()->id)->update(['auto_page' => 'checkout', 'auto_datetime' => date('y-m-d H:i:s'), 'auto_email' => 0]);
        $external_code = "";
        $user = auth()->user();
        $cartItems = [];
        $cookieItems = [];
        $cookieCartItems = [];
        $totalCartItems = 0;
        $totalQuantityItems = 0;
        $subtotal = 0.00;
        $discountPrice = 0.00;
        $totalPrice = 0.00;
        $no_items = 0;
        $product_dis = array();
        $cartItems = Cart::where('user_id', $user->id)->with('product.medias')->get();
        $totalQuantityItems = DB::table('carts')->where('user_id', $user->id)->sum('quantity');
        if ($request->session()->has('_code')) {
            $external_code = $request->session()->get('_code');
        }
        if (count($cartItems) == 0 || empty($cartItems)) {
            return redirect('/');
        }

        if ($cartItems) {
            foreach ($cartItems as $vari) {
                $no_items += 1;
                $subtotal += round(floatval($vari->product->sale_price) * $vari->quantity);
                if ($vari->product->discount > 0) {
                    $discount = round(floatval(floatval($vari->product->regular_price) * $vari->quantity) - floatval(floatval($vari->product->sale_price) * $vari->quantity));
                    array_push($product_dis, $discount);
                    $discountPrice += $discount;
                }else{
                    $discount = 0;
                    array_push($product_dis, $discount);
                    $discountPrice += $discount;
                }
            }

            $totalCartItems = count($cartItems);
        }
        $totalPrice = $subtotal;
        $locations = DB::table('user_addresses')->where('user_id', auth()->user()->id)->get();

        $user_coupons = $this->coupons($cartItems);

        $coupon_dis = 0.00;

        $wallet = 0.00;
        $credit = 0.00;
        $debit = 0.00;
        $user_wallets = DB::table('wallets')->where('user_id', $user->id)->get();
        if ($user_wallets->isNotEmpty()) {
            foreach ($user_wallets as $user_wallet) {
                if ($user_wallet->status == 'credited') {
                    $credit += $user_wallet->amount;
                }
                if ($user_wallet->status == 'debited') {
                    $debit += $user_wallet->amount;
                }
            }
            if ($credit > $debit) {
                $wallet = $credit - $debit;
            }
        }

        return view('frontend.checkout.index', compact(
            'cartItems',
            'totalCartItems',
            'subtotal',
            'discountPrice',
            'totalPrice',
            'locations',
            'user_coupons',
            'product_dis',
            'coupon_dis',
            'wallet',
            'external_code',
            'no_items'
        ));
    }

    public function couponApply(Request $request)
    {
        if (!empty($request->coupon_code)) {
            $coupon = Coupon::where([
                ['code', '=', $request->coupon_code],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['coupon_limit', '>=', 'times_applied']
            ])->with('coupon_used')->first();
            if (!empty($coupon)) {
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                $total = 0.00;
                $coupon_disc = 0.00;
                $user = auth()->user();
                $checkout_items = array();
                $cartItems = Cart::where('user_id', $user->id)->with('product.category.parent.parent', 'product.medias')->get();
                if ($cartItems) {
                    $cart_value = 0.00;
                    foreach ($cartItems as $vari) {
                        $cart_value += $vari->product->sale_price * $vari->quantity;
                    }
                    foreach ($cartItems as $vari) {
                        if ($cart_value > $coupon->min_order_amount) {
                            if ($coupon->type == 'merchandise') {
                                if (
                                    !empty($coupon->product_id) &&
                                    !empty($vari->product) &&
                                    $coupon->product_id == $vari->product_id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->sub_cat_id) &&
                                    !empty($vari->product->parent_id) &&
                                    $coupon->sub_cat_id == $vari->product->parent_id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->cat_id) && isset($vari->product->category->parent) &&
                                    !empty($vari->product->category->parent) &&
                                    $coupon->cat_id == $vari->product->category->parent->id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->cat_id) && isset($vari->product->category->parent) &&
                                    !empty($vari->product->parent_id) &&
                                    $coupon->cat_id == $vari->product->parent_id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->main_cat_id) && isset($vari->product->category->parent->parent) &&
                                    !empty($vari->product->category->parent->parent) &&
                                    $coupon->main_cat_id == $vari->product->category->parent->parent->id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->main_cat_id) && isset($vari->product->category->parent) &&
                                    !empty($vari->product->parent_id) &&
                                    $coupon->main_cat_id == $vari->product->parent_id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } elseif (
                                    !empty($coupon->brand_id) && isset($vari->product->brand_id) &&
                                    !empty($vari->product->brand_id) &&
                                    $coupon->brand_id == $vari->product->brand_id &&
                                    $user_times < 1
                                ) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } else {
                                    $emptycoupon = '';
                                    array_push($checkout_items, $this->disc_apply($vari, $emptycoupon));
                                }
                            } elseif ($coupon->type == 'customer_based') {
                                if ($coupon->user_id == auth()->user()->id && $coupon->coupon_limit >= $coupon->times_applied) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } else {
                                    $emptycoupon = '';
                                    array_push($checkout_items, $this->disc_apply($vari, $emptycoupon));
                                }
                            } elseif ($coupon->type == 'personal_code' || $coupon->type == 'global') {
                                if ($user_times < 1) {
                                    array_push($checkout_items, $this->disc_apply($vari, $coupon));
                                } else {
                                    $emptycoupon = '';
                                    array_push($checkout_items, $this->disc_apply($vari, $emptycoupon));
                                }
                            } elseif ($coupon->type == 'cart_value_discount') {
                                array_push($checkout_items, $this->disc_apply($vari, $coupon));
                            } else {
                                $emptycoupon = '';
                                array_push($checkout_items, $this->disc_apply($vari, $emptycoupon));
                            }
                        } else {
                            $emptycoupon = '';
                            array_push($checkout_items, $this->disc_apply($vari, $emptycoupon));
                        }
                    }
                    if (!empty($checkout_items)) {
                        foreach ($checkout_items as $items) {
                            foreach ($items as $item) {
                                $coupon_disc += $item['coupon_disc'];
                                $total += $item['sale'];
                            }
                        }
                    }
                }

                $data = new Collection();

                $data->push([
                    'checkout_items'    =>  $checkout_items,
                    'coupon_disc'       =>  $coupon_disc,
                    'total'             =>  $total,
                    'coupon'            =>  $coupon,
                ]);

                return response()->json(['status' => 200, 'message' => "successfull", $data]);
            }

            //not found
            return response()->json(['status' => 404, 'message' => "You entered invalid coupon code"]);

            // return response()->json(['status' => 502,'message' => ""]);
        }
        return response()->json(['status' => 406, 'message' => "Please enter coupon"]);
    }

    public function coupons($cartItems)
    {
        $user_coupons = new Collection();
        foreach ($cartItems as $cartItem) {
            $product = Product::where('id', $cartItem->product_id)->with('category.parent.parent')->first();
            $brand_id = $product->brand_id;
            $main_cat_id = '';
            $cat_id = '';
            $sub_cat_id = '';
            if (isset($product->category->parent->parent->id)) {
                $main_cat_id = $product->category->parent->parent->id;
            }
            if (isset($product->category->parent->id)) {
                $cat_id = $product->category->parent->id;
            }
            if (isset($product->category->id)) {
                $sub_cat_id = $product->category->id;
            }

            $brand_coupons = Coupon::where([
                ['type', '=', 'merchandise'],
                ['brand_id', '=', $brand_id],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['show_in_front', '=', '1'],
            ])->with('coupon_used')->get();

            $main_cat_coupons = Coupon::where([
                ['type', '=', 'merchandise'],
                ['main_cat_id', '=', $main_cat_id],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['show_in_front', '=', '1'],
            ])->with('coupon_used')->get();

            $cat_coupons = Coupon::where([
                ['type', '=', 'merchandise'],
                ['cat_id', '=', $cat_id],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['show_in_front', '=', '1'],
            ])->with('coupon_used')->get();

            $sub_cat_coupons = Coupon::where([
                ['type', '=', 'merchandise'],
                ['sub_cat_id', '=', $sub_cat_id],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['show_in_front', '=', '1'],
            ])->with('coupon_used')->get();

            $product_coupons = Coupon::where([
                ['type', '=', 'merchandise'],
                ['product_id', '=', $product->id],
                ['offer_start', '<=', date('Y-m-d H:i:s')],
                ['offer_end', '>=', date('Y-m-d H:i:s')],
                ['show_in_front', '=', '1'],
            ])->with('coupon_used')->get();

            foreach ($brand_coupons as $coupon) {
                $coupon_used_times = count($coupon->coupon_used);
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                    $user_coupons->push([
                        'id'            =>  $coupon->id,
                        'code'          =>  $coupon->code,
                        'name'          =>  $coupon->name,
                        'disc_type'     =>  $coupon->disc_type,
                        'discount'      =>  $coupon->discount,
                    ]);
                }
            }

            foreach ($main_cat_coupons as $coupon) {
                $coupon_used_times = count($coupon->coupon_used);
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                    $user_coupons->push([
                        'id'            =>  $coupon->id,
                        'code'          =>  $coupon->code,
                        'name'          =>  $coupon->name,
                        'disc_type'     =>  $coupon->disc_type,
                        'discount'      =>  $coupon->discount,
                    ]);
                }
            }

            foreach ($cat_coupons as $coupon) {
                $coupon_used_times = count($coupon->coupon_used);
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                    $user_coupons->push([
                        'id'            =>  $coupon->id,
                        'code'          =>  $coupon->code,
                        'name'          =>  $coupon->name,
                        'disc_type'     =>  $coupon->disc_type,
                        'discount'      =>  $coupon->discount,
                    ]);
                }
            }

            foreach ($sub_cat_coupons as $coupon) {
                $coupon_used_times = count($coupon->coupon_used);
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                    $user_coupons->push([
                        'id'            =>  $coupon->id,
                        'code'          =>  $coupon->code,
                        'name'          =>  $coupon->name,
                        'disc_type'     =>  $coupon->disc_type,
                        'discount'      =>  $coupon->discount,
                    ]);
                }
            }

            foreach ($product_coupons as $coupon) {
                $coupon_used_times = count($coupon->coupon_used);
                $user_times = 0;
                foreach ($coupon->coupon_used as $used) {
                    if ($used->user_id == auth()->user()->id) {
                        $user_times += 1;
                    }
                }
                if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                    $user_coupons->push([
                        'id'            =>  $coupon->id,
                        'code'          =>  $coupon->code,
                        'name'          =>  $coupon->name,
                        'disc_type'     =>  $coupon->disc_type,
                        'discount'      =>  $coupon->discount,
                    ]);
                }
            }
        }

        $customerwise_coupons = Coupon::where([
            ['user_id', '=', auth()->user()->id],
            ['type', '=', 'customer_based'],
            ['show_in_front', '=', '1'],
            ['offer_start', '<=', date('Y-m-d H:i:s')],
            ['offer_end', '>=', date('Y-m-d H:i:s')],
            ['coupon_limit', '>=', 'times_applied']
        ])->with('coupon_used')->get();

        foreach ($customerwise_coupons as $coupon) {
            if (!empty($coupon)) {
                $user_coupons->push([
                    'id'            =>  $coupon->id,
                    'code'          =>  $coupon->code,
                    'name'          =>  $coupon->name,
                    'disc_type'     =>  $coupon->disc_type,
                    'discount'      =>  $coupon->discount,
                ]);
            }
        }

        $global_coupons = Coupon::where([
            ['user_id', '=', auth()->user()->id],
            ['type', '=', 'global'],
            ['show_in_front', '=', '1'],
            ['offer_start', '<=', date('Y-m-d H:i:s')],
            ['offer_end', '>=', date('Y-m-d H:i:s')]
        ])->with('coupon_used')->get();

        foreach ($global_coupons as $coupon) {
            $coupon_used_times = count($coupon->coupon_used);
            $user_times = 0;
            foreach ($coupon->coupon_used as $used) {
                if ($used->user_id == auth()->user()->id) {
                    $user_times += 1;
                }
            }
            if (!empty($coupon) && $coupon->coupon_limit > $coupon_used_times && $user_times < 1) {
                $user_coupons->push([
                    'id'            =>  $coupon->id,
                    'code'          =>  $coupon->code,
                    'name'          =>  $coupon->name,
                    'disc_type'     =>  $coupon->disc_type,
                    'discount'      =>  $coupon->discount,
                ]);
            }
        }

        $user_coupons = $user_coupons->unique();

        return $user_coupons;
    }

    public function disc_apply($vari, $coupon)
    {
        $checkout_items = new Collection();
        $disc_amt = 0.00;
        if (!empty($coupon)) {
            if ($coupon->disc_type == 'percent') {
                $disc = floatval((floatval($vari->product->sale_price) * $coupon->discount) / 100);
                if ($disc > $coupon->max_order_amount) {
                    $disc = $coupon->max_order_amount;
                }
                $sale = (floatval($vari->product->sale_price) - floatval($disc)) * $vari->quantity;
                $disc_amt = $disc * $vari->quantity;
            }
            if ($coupon->disc_type == 'amount') {
                $disc = $coupon->discount;
                if ($vari->product->sale_price < $disc) {
                    $disc_amt = $disc * $vari->quantity;
                    $sale = (floatval($vari->product->sale_price) - $coupon->discount) * $vari->quantity;
                } else {
                    $sale = floatval($vari->product->sale_price) * $vari->quantity;
                }
            }
        } else {
            $sale = floatval($vari->product->sale_price) * $vari->quantity;
        }
        $total_disc = (floatval($vari->product->regular_price) - floatval($vari->product->sale_price)) + $disc_amt;

        $checkout_items->push([
            'coupon_disc'       =>  $disc_amt,
            'product_disc'      =>  floatval($vari->product->regular_price) - floatval($vari->product->sale_price),
            'product_name'      =>  $vari->product->name . "-" . $vari->product->name,
            'sale'              =>  $sale,
            'cart_id'           =>  $vari->id,
            'qty'               =>  $vari->quantity,
            'regular'           =>  floatval($vari->product->regular_price) * $vari->quantity,
            'total_disc'        => $total_disc * $vari->quantity,
        ]);

        return $checkout_items;
    }

    public function create_razorpay_order(Request $request)
    {
        $keyId = 'rzp_live_f7q120n58ysQwH';
        $keySecret = 'xHKdv1TyRYrGr81uAfCDlFC0';

        $api = new Api($keyId, $keySecret);

        $orderData = [
            'receipt'         => 3456,
            'amount'          => $request->total * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $data['razorpayOrderId'] = $razorpayOrder['id'];
        $data['amount'] = $orderData['amount'];
        $data['user'] = auth()->user();

        return response()->json($data);
    }

    public function checkoutCouponGet(Request $request)
    {
        if (auth()->user()) {
            $request->session()->forget('_code');
            if (isset($request->_code)) {
                if (DB::table('coupons')->where(['code' => $request->_code, 'user_id' => auth()->user()->id, 'times_applied' => null])->first()) {
                    $request->session()->put('_code', $request->_code);
                }
                return redirect('checkout');
            }
            return redirect('checkout');
        } else {
            return redirect()->route('login');
        }
    }
}
