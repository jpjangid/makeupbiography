<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'              =>  'required',
            'email'             =>  'required',
            'comment'           =>  'required',
        ], [
            'name.required'             =>  'Please Enter Your Name',
            'email.required'            =>  'Please Enter Your Email',
            'comment.required'          =>  'Please Enter Your Comment',
        ]);

        Comment::create([
            'blog_id'       =>  $request->blog_id,
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'comment'       =>  $request->comment,
            'website'       =>  $request->website,
        ]);

        return redirect()->back()->with('success','Comment Add Successfully');
    }
}
