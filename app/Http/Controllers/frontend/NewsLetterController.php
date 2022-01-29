<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Exception;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($request->email)) {
            $emailErr = "";
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Please Enter Valid Email";
            }
            if ($emailErr == "") {
                $email = NewsLetter::where('email', $request->email)->first();
                if (empty($email)) {
                    NewsLetter::create([
                        'email'     =>  $request->email,
                    ]);
                }
                return response()->json(['msg' => 'Email Subscribed Successfully', 'code' => 200]);
            } else {
                return response()->json(['msg' => $emailErr, 'code' => 500]);
            }
        } else {
            return response()->json(['msg' => 'Please Enter Email', 'code' => 500]);
        }
    }
}
