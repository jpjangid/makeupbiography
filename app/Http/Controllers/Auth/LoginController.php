<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Socialite;
use Exception;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Cart;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin';
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Facebook Login
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    //Google Login
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }

    //cart function
    public function authenticated(Request $request)
    {
        $cart = [];
        $minutes = 60;
        $user = auth()->user();
        if ($user) {
            $cartItems = Cart::where('user_id', $user->id)->get();
            if ($request->hasCookie('makeup_biography')) {
                $cookieValues = json_decode($request->cookie('makeup_biography'));

                foreach ($cookieValues  as $cookieValue) {
                    $cart[] = ['product_id' => $cookieValue->product_id, 'quantity' => $cookieValue->quantity, 'product_variant_id' => $cookieValue->product_variant_id];
                }

                \Cookie::queue(\Cookie::forget('makeup_biography'));

                foreach ($cartItems  as $cartItem) {
                    foreach ($cart  as $key => $cartValue) {
                        if ($cartValue['product_id'] == $cartItem->product_id && $cartValue['product_variant_id'] == $cartItem->product_variant_id) {
                            /// Update data
                            Cart::where('id', $cartItem->id)
                                ->update(['quantity' =>  $cartItem->quantity + $cartValue['quantity']]);
                            unset($cart[$key]);
                        }
                    }
                }
                foreach ($cart  as $key => $cartValue) {
                    $CartTable = new Cart;
                    $CartTable->product_id = $cartValue['product_id'];
                    $CartTable->product_variant_id = $cartValue['product_variant_id'];
                    $CartTable->user_id = $user->id;
                    $CartTable->quantity = $cartValue['quantity'];
                    $CartTable->save();
                }
            }
        }
    }
}
