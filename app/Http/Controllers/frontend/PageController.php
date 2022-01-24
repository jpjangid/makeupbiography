<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = DB::table('pages')->where('slug',$slug)->first();

        if(!empty($page)){
            if($page->title == "About"){
                return view('frontend.page.aboutus', compact('page'));
            }elseif($page->title == "FAQ's"){
                return view('frontend.page.faq', compact('page'));
            }elseif($page->title == "Return Policy"){
                return view('frontend.page.return_policy', compact('page'));
            }elseif($page->title == "Shipping Policy"){
                return view('frontend.page.shipping_policy', compact('page'));
            }elseif($page->title == "Cancellation Policy"){
                return view('frontend.page.cancellation_policy', compact('page'));
            }elseif($page->title == "Privacy Policy"){
                return view('frontend.page.privacy_policy', compact('page'));
            }elseif($page->title == "Terms & Conditions"){
                return view('frontend.page.terms&conditions', compact('page'));
            }elseif($page->title == "Contact Us"){
                return view('frontend.page.contactus', compact('page'));
            }else{
                return view('404');
            }
        }else{
            return view('404');
        }
    }
}
