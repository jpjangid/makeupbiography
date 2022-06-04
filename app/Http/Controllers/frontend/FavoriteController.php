<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    //wishlist index page
    public function index()
    {
        $user = auth()->user()->id;
        if (empty($user)) {
            return redirect()->route('login');
        }
        $favourites1 = DB::table('favorites')->where(['user_id' => auth()->user()->id])->get();
        foreach ($favourites1 as $fav) {
            if (Product::where('id', $fav->product_id)->where(['status' => 0, 'flag' => 0])->orWhere('flag', 1)->first()) {
                DB::table('favorites')->where(['user_id' => auth()->user()->id, 'product_id' => $fav->product_id])->delete();
            }
        }

        $favorites = Favorite::where(['user_id' => auth()->user()->id])->with('product:id,item_shade_name,slug,sale_price,regular_price')->get();
        return view('frontend.wishlist.index', compact('favorites'));
    }

    //add item to wishlist
    public function store(Request $request)
    {
        $product = DB::table('products')->select('item_shade_name','status','flag')->where('id', $request->product_id)->first();
        if ($product->status == 0 || $product->flag == 1) {
            $message = "Product " . $product->item_shade_name . " is not available right now";
            $count = DB::table('favorites')->where('user_id', auth()->user()->id)->count();
            return response()->json(['status' => 404, 'message' => $message, 'count' => $count]);
        }

        if (!empty(DB::table('favorites')->where(['product_id' => $request->product_id, 'user_id' => auth()->user()->id])->first())) {
            $message = "Product " . $product->item_shade_name . " added to wishlist successfully";
            $count = DB::table('favorites')->where('user_id', auth()->user()->id)->count();
            return response()->json(['status' => 200, 'message' => 'Product added to wishlist successfully', 'count' => $count]);
        }

        $favorite = Favorite::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id
        ]);
        $message = "Product " . $product->item_shade_name . " added to wishlist successfully";
        $count = DB::table('favorites')->where('user_id', auth()->user()->id)->count();

        return response()->json(['status' => 200, 'message' => $message, 'count' => $count]);
    }

    //delete item from wishlist
    public function destroy($id)
    {
        $favorite = DB::table('favorites')->where([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ])->delete();

        $message = "Product deleted from wishlist successfully";
        return redirect('wishlist')->with('success', $message);
    }

    //add to cart from wishlist 
    public function addToCart(Request $request)
    {
        $fav = DB::table('favorites')->find($request->wishlistId);
        if (DB::table('products')->where('id', $fav->product_id)->where(['status' => 1, 'flag' => 0, 'ecom' => 'ONLINE'])->first()) {
            DB::table('favorites')->where(['user_id' => auth()->user()->id, 'product_id' => $fav->product_id])->delete();
            return redirect('wishlist');
        }

        $cart = DB::table('carts')->where(['product_id' => $fav->product_id, 'user_id' => auth()->user()->id])->first();
        if (!empty($cart)) {
            Cart::where(['product_id' => $fav->product_id, 'user_id' => auth()->user()->id])->update(['quantity' => $cart->quantity + 1]);
        } else {
            Cart::create([
                'product_id' => $fav->product_id,
                'product_variant_id' => $fav->product_variant_id,
                'user_id' => $fav->user_id,
                'quantity' => 1
            ]);
        }

        DB::table('favorites')->where(['user_id' => auth()->user()->id, 'product_id' => $fav->product_id])->delete();
        return redirect('wishlist')->with('success', 'Product added to cart successfully');
    }
}
