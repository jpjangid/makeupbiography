<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index($cat)
    {
        if($cat == 'all'){
            $blogs = Blog::where(['flag' => '0'])->orderby('publish_date','desc')->get();
        }else{
            $blogs = Blog::where(['flag' => '0', 'category' => $cat])->orderby('publish_date','desc')->get();
        }
        $tags = array();
        foreach($blogs as $blog){
            $blogtag = explode(",", $blog->tags);
            foreach($blogtag as $tag){
                array_push($tags, trim($tag));
            }
        }
        $finaltags = array_unique($tags);
        return view('frontend.blog.index', compact('blogs','cat','finaltags'));
    }

    public function detail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        $blogtags = explode(",", $blog->tags);
        $tags = array_map('trim', $blogtags);
        $comments = Comment::where('blog_id',$blog->id)->get();
        $blogs = Blog::where([['flag','=','0'],['id','!=',$blog->id]])->orderby('publish_date','desc')->get();
        return view('frontend.blog.detail', compact('blog','blogs','tags','comments'));
    }

    public function blogtag($tag)
    {
        $cat = 'all';
        $blogs = Blog::where([['flag','=','0'],['tags','like','%'.$tag.'%']])->orderby('publish_date','desc')->get();
        $allblogs = Blog::where(['flag' => '0'])->orderby('publish_date','desc')->get();
        $tags = array();
        foreach($allblogs as $blog){
            $blogtag = explode(",", $blog->tags);
            foreach($blogtag as $tag){
                array_push($tags, trim($tag));
            }
        }
        $finaltags = array_unique($tags);
        return view('frontend.blog.index', compact('blogs','cat','finaltags'));
    }
}
