<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('backend.profile.edit');
    }

    //for update profile for frontend user
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->mobile = $request->mobile; 
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if(auth()->user()->role == 'admin') {
            return redirect('admin/profile')->with('success','Password updated successfully');
        }

        return redirect()->back()->with('success','Password updated successfully');
    }

    public function destroy($id)
    {
        //
    }
}
