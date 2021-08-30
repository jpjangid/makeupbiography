<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    //view for my-account
    public function myaccount()
    {
        if(auth()->user()->role == 'admin') {
            return redirect('admin/profile');
        }
        return view('frontend.myaccount.myaccount');
    }

    //view for my-wallet
    public function mywallet()
    {
        return view('frontend.myaccount.mywallet');
    }

    //view for myorders
    public function myorders()
    {
        return view('frontend.myaccount.myorders');
    }

    //view for wishlist
    public function wishlist()
    {
        return view('frontend.wishlist.empty');
    }

    //view for question answers
    public function question_answers()
    {
        return view('frontend.myaccount.question_answer');
    }

    //view for my address
    public function myaddress()
    {
        return view('frontend.myaccount.myaddress_empty');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
