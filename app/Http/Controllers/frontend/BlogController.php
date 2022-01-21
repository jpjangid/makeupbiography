<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index($cat)
    {
        $page = Page::where('slug','blogs')->first();

        if(empty($page)){
            return view('404');
        }

        if ($cat == 'all') {
            $blogs = Blog::where(['flag' => '0'])->orderby('publish_date', 'desc')->get();
        } else {
            $blogs = Blog::where(['flag' => '0', 'category' => $cat])->orderby('publish_date', 'desc')->get();
        }

        $tags = array();
        foreach ($blogs as $blog) {
            $blogtag = explode(",", $blog->tags);
            foreach ($blogtag as $tag) {
                array_push($tags, trim($tag));
            }
        }
        $finaltags = array_unique($tags);

        $allblogs = Blog::where(['flag' => '0'])->orderby('publish_date', 'desc')->get();
        $allcats = array();
        foreach ($allblogs as $allblog) {
            array_push($allcats, $allblog->category);
        }
        $categories = array_unique($allcats);

        return view('frontend.blog.index', compact('blogs', 'cat', 'finaltags', 'categories','page'));
    }

    public function detail($cat, $slug)
    {
        $allblogs = Blog::where(['flag' => '0'])->orderby('publish_date', 'desc')->get();
        $allcats = array();
        foreach ($allblogs as $allblog) {
            array_push($allcats, $allblog->category);
        }
        $categories = array_unique($allcats);

        if ($cat == 'tag') {
            $cat = 'all';
            $blogs = Blog::where([['flag', '=', '0'], ['tags', 'like', '%' . $cat . '%']])->orderby('publish_date', 'desc')->get();
            $tags = array();
            foreach ($allblogs as $blog) {
                $blogtag = explode(",", $blog->tags);
                foreach ($blogtag as $tag) {
                    array_push($tags, trim($tag));
                }
            }
            $finaltags = array_unique($tags);

            $page = Page::where('slug','blogs')->first();
    
            if(empty($page)){
                return view('404');
            }

            return view('frontend.blog.index', compact('blogs', 'cat', 'finaltags', 'categories','page'));
        } else {
            $blog = Blog::where('slug', $slug)->first();
            $blogtags = explode(",", $blog->tags);
            $tags = array_map('trim', $blogtags);
            $comments = Comment::where('blog_id', $blog->id)->get();
            $blogs = Blog::where([['flag', '=', '0'], ['id', '!=', $blog->id]])->orderby('publish_date', 'desc')->get();
            return view('frontend.blog.detail', compact('blog', 'blogs', 'tags', 'comments', 'categories'));
        }
    }
}
