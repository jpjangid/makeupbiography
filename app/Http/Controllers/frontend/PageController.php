<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug',$slug)->first();

        if(!empty($page)){
            if($page->title == "About"){
                return view('frontend.page.aboutus', compact('page'));
            }elseif($page->title == "FAQ's"){
                return view('frontend.page.faq', compact('page'));
            }else{
                return view('404');
            }
        }else{
            return view('404');
        }
    }
}
