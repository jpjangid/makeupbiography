<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index($cat)
    {
        if($cat == 'all'){
            $blogs = Blog::where(['flag' => '0'])->orderby('publish_date','desc')->get();
        }else{
            $blogs = Blog::where(['flag' => '0', 'category' => $cat])->orderby('publish_date','desc')->get();
        }
        return view('frontend.blog.index', compact('blogs','cat'));
    }
}
