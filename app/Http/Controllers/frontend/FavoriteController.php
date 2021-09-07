<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductVariant;

class FavoriteController extends Controller
{
    //wishlist index page
    public function index()
    {
        $user = auth()->user()->id;
        if(empty($user)) {
            return redirect()->route('login');
        }
        $favourites1 = Favorite::where(['user_id' => auth()->user()->id])->get();
        foreach($favourites1 as $fav) {
            if(Product::where('id',$fav->product_id)->where(['status'=> 0,'flag' => 0])->orWhere('flag',1)->first()) {
                Favorite::where(['user_id' => auth()->user()->id,'product_id' => $fav->product_id])->delete();
            }
        }

        $favorites = Favorite::where(['user_id' => auth()->user()->id])->with('product:id,name,slug','productVariant:id,name,slug,sale_price,regular_price')->get();
        return view('frontend.wishlist.index',compact('favorites'));
    }

    public function create()
    {
        //
    }

    //add item to wishlist
    public function store(Request $request)
    {
        $product = Product::select('name')->where('id',$request->product_id)->first();
        $product_variant = ProductVariant::where('id',$request->product_variant_id)->first();
        if($product->status == 0 && $product->flag == 1 || $product->status == 0 && $product->flag == 1) {
         $message = "Product ".$product->name."-".$product_variant->name." is not available right now";
         $count = Favorite::where('user_id',auth()->user()->id)->count();
         return response()->json(['status' => 404,'message' => $message,'count' => $count]);
        }

        if(!empty(Favorite::where(['product_id' => $request->product_id,'product_variant_id' => $request->product_variant_id,'user_id' => auth()->user()->id])->first())){
            $message = "Product ".$product->name."-".$product_variant->name." added to wishlist successfully";
            $count = Favorite::where('user_id',auth()->user()->id)->count();
            return response()->json(['status' => 200,'message'=>'Product added to wishlist successfully','count' => $count]);
        }

        $favorite = Favorite::create([
            'product_id' => $request->product_id,
            'product_variant_id' => $request->product_variant_id,
            'user_id' => auth()->user()->id
        ]);
        $message = "Product ".$product->name."-".$product_variant->name." added to wishlist successfully";
        $count = Favorite::where('user_id',auth()->user()->id)->count();

        return response()->json(['status' => 200,'message'=>$message,'count' => $count]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    //delete item from wishlist
    public function destroy($id)
    {
        $favorite = Favorite::where([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ])->delete();

        $message = "Product deleted from wishlist successfully";
        return redirect('wishlist')->with('success', $message);

    }

    //add to cart from wishlist 
    public function addToCart(Request $request)
    {  
        $fav = Favorite::find($request->wishlistId);
        if(Product::where('id',$fav->product_id)->where(['status'=> 0,'flag' => 0])->orWhere('flag',1)->first()) {
            Favorite::where(['user_id' => auth()->user()->id,'product_id' => $fav->product_id,'product_variant_id' => $fav->product_variant_id])->delete();
            return redirect('wishlist');
        }

        $cart = Cart::where(['product_id' => $fav->product_id,'product_variant_id' => $fav->product_variant_id,'user_id' => auth()->user()->id])->first();
        if(!empty($cart)) {
            Cart::where(['product_id' => $fav->product_id,'product_variant_id' => $fav->product_variant_id,'user_id' => auth()->user()->id])->update(['quantity' => $cart->quantity+1]);
        } else {
            Cart::create([
                'product_id' => $fav->product_id,
                'product_variant_id' => $fav->product_variant_id,
                'user_id' => $fav->user_id,
                'quantity' => 1
            ]);
        }

        Favorite::where(['user_id' => auth()->user()->id,'product_id' => $fav->product_id,'product_variant_id' => $fav->product_variant_id])->delete();
        return redirect('wishlist')->with('success','Product added to cart successfully');
    }
}
