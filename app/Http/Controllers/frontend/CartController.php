<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\ProductVariantMedia;

class CartController extends Controller
{
   //adding product to cart
   public function add_to_cart(Request $request)
   {
       $cart = [];
       $minutes = 60*24*30;
       $user = auth()->user();
       $existCookie = false;
       $checkTrue = false;
       $message = ProductVariant::select('name')->where('id',$request->product_varient_id)->first();
       $product = Product::select('name')->where('id',$request->product_id)->first();
       if($product->status == 1 && $product->flag == 0) {
        $message = "";
        return response($message);
       }
       
       if($user)
       {
           $cartItems = Cart::where('user_id',$user->id)->where('product_id',$request->product_id)->where('product_variant_id',$request->product_varient_id)->first();

           if($cartItems)
           {
               //update data
               Cart::where('id', $cartItems->id)
               ->update(['quantity' =>  $cartItems->quantity + $request->product_quantity]);
           }
           else
           {
               // Insert data
               $CartTable = new Cart;
               $CartTable->product_id = $request->product_id;
               $CartTable->product_variant_id = $request->product_varient_id;
               $CartTable->user_id = $user->id;
               $CartTable->quantity = $request->product_quantity;
               $CartTable->save();
           }
       }
       else
       {
           if($request->hasCookie('makeup_biography'))
           {
               $cartItems = json_decode(request()->cookie('makeup_biography'));

               foreach($cartItems  as $cartItem)
               {
                   if($cartItem->product_id == $request->product_id && $cartItem->product_variant_id  == $request->product_varient_id)
                   {
                       $cartItem->quantity += $request->product_quantity;
                       $existCookie = true;
                   }
                   $cart[]=['product_id'=>$cartItem->product_id,'product_variant_id'=>$request->product_varient_id,'quantity'=>$cartItem->quantity];
               }
               if(!$existCookie)
               {
                   $cart[]=['product_id'=>$request->product_id,'product_variant_id' => $request->product_varient_id,'quantity'=>$request->product_quantity];
               }
           }
           else
           {
               $cart[]=['product_id'=>$request->product_id,'product_variant_id'=>$request->product_varient_id,'quantity'=>$request->product_quantity];
           }
           $array_json=json_encode($cart);
           \Cookie::queue('makeup_biography', $array_json, $minutes);
       }
  
       $message = $product->name."-".$message->name." has been added to your cart.";
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
       if($user)
       {
           $cartItems = Cart::where('user_id',$user->id)->with(['product' => function($query)
           {
               $query->where(['status' => 1,'flag' => 0]);
           },
           'productVariant.medias'])->get();

           $totalQuantityItems = Cart::where('user_id',$user->id)->sum('quantity');
           if($cartItems)
           {
               foreach($cartItems as $vari) {
                if(Product::where('id',$vari->product_id)->where(['status'=> 0,'flag' => 0])->orWhere('flag',1)->first()) {
                    Cart::where(['product_id' => $vari->product_id,'user_id' => $vari->user_id])->delete();
                } else {
                    $subtotal += round(floatval($vari->productVariant->sale_price) * $vari->quantity); 
                    if($vari->productVariant->discount > 0){
                        $discountPrice = round(floatval(floatval($vari->productVariant->regular_price) * $vari->quantity) - floatval(floatval($vari->productVariant->sale_price) * $vari->quantity));
                    }
                   }
                   $totalCartItems = count($cartItems);
                }
           }
       }
       else
       {
            $minutes = 60;
            if(request()->hasCookie('makeup_biography'))
            {
                $cartItems = json_decode(request()->cookie('makeup_biography'));

                foreach($cartItems  as $cartItem)
                {
                    if(empty(Product::where('id',$cartItem->product_id)->where(['status'=> 0,'flag' => 0])->orWhere('flag',1)->first()) === true) {
                        $cart[]=['product_id'=>$cartItem->product_id,'quantity'=>$cartItem->quantity,'product_variant_id' => $cartItem->product_variant_id];
                    } 
                }
            }
            if(empty($cart))
            {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            }
            else
            {
                $array_json=json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }

           if(request()->cookie('makeup_biography'))
           {
               $cookieItems = json_decode(request()->cookie('makeup_biography'));
               $totalCartItems = count($cookieItems);
               foreach ($cookieItems as $cookieItem)
               {
                   if($cookieItem->product_id){
                       $variantId = $cookieItem->product_variant_id; 
                       $cookie_products = Product::with(['variants' => function($query) use ($variantId) {
                           $query->where('id',$variantId)->first();
                       }])->where([
                           ['products.status', '=', 1],
                           ['products.id', '=', $cookieItem->product_id],
                           ['products.flag', '=', 0]
                       ])->first();
                       $totalQuantityItems += $cookieItem->quantity; 
                        if($cookie_products != ""){  
                          $cookieCartItems[] = ['quantity'=>$cookieItem->quantity,'product'=>$cookie_products,'product_variant_id' => $cookieItem->product_variant_id];
                        }      
                    }
               }
           }

       }
       if(request()->ajax()) {
         if(count($cartItems) > 0) {
            $cartItems = $cartItems->take(3);
         }
         $listItem = "";
         if(count($cartItems) > 0) {
            foreach($cartItems as $item) {
                $listItem .= $this->list_items($item);
             }
         }

         if(count($cookieCartItems) > 0) {
            foreach($cookieCartItems as $cookie_item) {  
              if($cookie_item['product'] != "") {
                $listItem .= $this->cookie_items($cookie_item);
              }  
            }
         }   

         $data['totalQuantityItems'] = $totalQuantityItems;
         $data['listItem'] = $listItem;
         return response()->json($data); 
       }
       $totalPrice = $subtotal;

       return view('frontend.cart.index',compact('cartItems','cookieCartItems','totalCartItems','subtotal','discountPrice','totalPrice'));
   }

   //html cookie item for html page from cookie
   public function cookie_items($product) {
        $variant = $product['product']['variants'][0];
        $product_image = "";
        if(ProductVariantMedia::where('product_variant_id',$variant->id)->where('flag',0)->orderby('sequence','asc')->first()) {
            $pro_img = ProductVariantMedia::where('product_variant_id',$variant->id)->orderby('sequence','asc')->first();
            $product_image = asset('storage/products/variants/'.$pro_img->media);
        }

        // $image = asset('storage/product/'.$product->);
        $removeItem = url('remove/cart/item',['id'=>$product['product']->id,'variant_id'=>$product['product_variant_id']]);
        $item = '<li class="woocommerce-mini-cart-item c-product-list-widget__item mini_cart_item">
                    <div class="c-product-list-widget__wrap">
                        <div class="c-product-list-widget__thumb-col">
                            <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/"><img width="115" height="115" src="'.$product_image.'" class="c-product-list-widget__thumb" alt="" loading="lazy" srcset="'.$product_image.'" sizes="(max-width: 115px) 100vw, 115px"></a>					
                        </div>
                        <div class="c-product-list-widget__title-col">
                            <div class="c-product-list-widget__title">
                                '.$product['product']['name'].'-'.$variant->name.'								
                            </div>
                            <div class="c-product-list-widget__price">
                                <span class="quantity">'.$product['quantity'].' × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>'.$variant->sale_price.'</bdi></span></span>								
                            </div>
                        </div>
                        <button data-remove-url="'.$removeItem.'" class="remove-product-drop c-product-list-widget__remove remove" aria-label="Remove this item"><i class="ip-close-small c-product-list-widget__remove-icon"></i></button>						
                    </div>
                </li>';
        
        return $item; 
   }

   //html list item for html page from cart db
   public function list_items($product)
   {
        $removeItem = url('remove/cart/item',['id'=>$product->id,'variant_id'=>$product->product_variant_id ]);
        $product_image = "";
        if(ProductVariantMedia::where('product_variant_id',$product->productVariant->id)->where('flag',0)->orderby('sequence','asc')->first()) {
            $pro_img = ProductVariantMedia::where('product_variant_id',$product->productVariant->id)->orderby('sequence','asc')->first();
            $product_image = asset('storage/products/variants/'.$pro_img->media);
        }
        
        $item = '<li class="woocommerce-mini-cart-item c-product-list-widget__item mini_cart_item">
                    <div class="c-product-list-widget__wrap">
                        <div class="c-product-list-widget__thumb-col">
                            <a href="https://parkofideas.com/luchiana/demo/shop/airbrush-matte/"><img width="115" height="115" src="'.$product_image.'" class="c-product-list-widget__thumb" alt="" loading="lazy" srcset="'.$product_image.'" sizes="(max-width: 115px) 100vw, 115px"></a>					
                        </div>
                        <div class="c-product-list-widget__title-col">
                            <div class="c-product-list-widget__title">
                                '.$product->product->name.'-'.$product->productVariant->name.'								
                            </div>
                            <div class="c-product-list-widget__price">
                                <span class="quantity">'.$product->quantity.' × <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#8377;</span>'.$product->productVariant->sale_price.'</bdi></span></span>								
                            </div>
                        </div>
                        <button data-remove-url="'.$removeItem.'" class="remove-product-drop c-product-list-widget__remove remove" aria-label="Remove this item"><i class="ip-close-small c-product-list-widget__remove-icon"></i></button>						
                    </div>
                </li>';
        
        return $item;        
   }
    
   //remove item form cart
   public function remove_item(Request $request,$id,$variant_id)
   {
       $user = auth()->user();
       $cartItem = Cart::where('id',$id)->first();
       $minutes = 60;
       if($user) {
        if(!empty($cartItem) && $cartItem->user_id == auth()->user()->id) {
            Cart::where('id',$id)->delete();
            if(request()->ajax()) {
               return response()->json(['status' => 200]);
            }
            return redirect()->back()->with('success','Item has been removed form cart');
          }
       }
       else {
            if($request->hasCookie('makeup_biography'))
            {
                $cartItems = json_decode(request()->cookie('makeup_biography'));

                foreach($cartItems  as $cartItem)
                {
                    if($cartItem->product_id != $id && $cartItem->product_variant_id != $variant_id)
                    {
                        $cart[]=['product_id'=>$id,'quantity'=>$cartItem->quantity,'product_variant_id' => $cartItem->product_variant_id];
                    }
                }
            }
            if(empty($cart))
            {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            }
            else
            {
                $array_json=json_encode($cart);
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
        if($user) {
            if(count($request->cart_id) > 0) {
                foreach($request->cart_id as $key => $item) {
                    if($request->quantity[$key] == 0) {
                        Cart::where('id',$item)->delete();
                    }    
                    Cart::where('id',$item)->update(['quantity' => $request->quantity[$key]]);
                }    
            }
        } else {
            if($request->hasCookie('makeup_biography'))
            {
                $cartItems = json_decode(request()->cookie('makeup_biography'));
                $cartItems = collect($cartItems);
                foreach($request->product_id as $key => $p_id) {
                    if($cartItems->where(['product_id' => $p_id,'product_variant_id' => $request->product_variant_id[$key]])) {
                        if($request->quantity[$key] != 0) {
                            $cart[]=['product_id'=>$p_id,'quantity'=>$request->quantity[$key],'product_variant_id' => $request->product_variant_id[$key]];
                        }    
                    }
                }
            }
            if(empty($cart))
            {
                \Cookie::queue(\Cookie::forget('makeup_biography'));
            }
            else
            {
                $array_json=json_encode($cart);
                \Cookie::queue('makeup_biography', $array_json, $minutes);
            }
        }
        return redirect('cart')->with('success','Cart Updated');
    }

    //checkout function
    public function checkout()
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
       $cartItems = Cart::where('user_id',$user->id)->with('product','productVariant.medias')->get();
       $totalQuantityItems = Cart::where('user_id',$user->id)->sum('quantity');
       if($cartItems)
       {
            foreach($cartItems as $vari) {
            $subtotal += round(floatval($vari->productVariant->sale_price) * $vari->quantity); 
            if($vari->productVariant->discount > 0){
                $discountPrice = round(floatval(floatval($vari->productVariant->regular_price) * $vari->quantity) - floatval(floatval($vari->productVariant->sale_price) * $vari->quantity));
            }
            }

            $totalCartItems = count($cartItems);
       }
       $totalPrice = $subtotal;
       $locations = UserAddress::where('user_id',auth()->user()->id)->get();
    //    ->where('offer_start','>=',date('Y-m-d H:i:s'))
       $user_coupons = Coupon::where(['user_id' => auth()->user()->id,'type' => 'customer_based','show_in_front' => 1])->where('offer_start','<=',date('Y-m-d H:i:s'))->where('offer_end','>=',date('Y-m-d H:i:s'))->get();

       return view('frontend.checkout.index',compact('cartItems','totalCartItems','subtotal','discountPrice','totalPrice','locations','user_coupons'));
    }

    public function couponApply(Request $request)
    {
        if(!empty($request->coupon_code)) {
            if(Coupon::where('code',$request->coupon_code)->first()){
                return response()->json(['status' => 200,'message' => "found"]);
            }
            
            //not found
            return response()->json(['status' => 404,'message' => "You entered invalid coupon code"]);

            // return response()->json(['status' => 502,'message' => ""]);
        }
        return response()->json(['status' => 406,'message' => "Please enter coupon"]);
    }

}
