<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Notification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'numeric','digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role' => 'user',
            'password' => Hash::make($data['password']),
        ]);

        Notification::create(['title' => "New User",'message' => 'New User '.$user->email.' has beeen registered on your website.']);

        //cart code 
        $cart = [];
        $minutes = 60;
        if($user)
        {
            $cartItems = Cart::where('user_id',$user->id)->get();
            if(request()->hasCookie('makeup_biography'))
            {
                $cookieValues = json_decode(request()->cookie('makeup_biography'));

                foreach($cookieValues  as $cookieValue)
                {
                    $cart[]=['product_id'=>$cookieValue->product_id,'quantity'=>$cookieValue->quantity];
                }

                \Cookie::queue(\Cookie::forget('makeup_biography'));

                foreach($cartItems  as $cartItem)
                {
                    foreach($cart  as $key => $cartValue)
                    {
                        if($cartValue['product_id'] == $cartItem->product_id && $cartValue['product_variant_id'] == $cartItem->product_variant_id)
                        {
                            /// Update data
                            Cart::where('id', $cartItem->id)
                            ->update(['quantity' =>  $cartItem->quantity+$cartValue['quantity']]);
                            unset($cart[$key]);
                        }
                    }
                }
                foreach($cart  as $key => $cartValue)
                {
                    $CartTable = new Cart;
                    $CartTable->product_id = $cartValue['product_id'];
                    $CartTable->product_variant_id = $cartValue['product_variant_id'];
                    $CartTable->user_id = $user->id;
                    $CartTable->quantity = $cartValue['quantity'];
                    $CartTable->save();
                }
            }
        }

        return $user;
    }
}
