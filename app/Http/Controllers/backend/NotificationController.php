<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use DataTables;
use Illuminate\Support\Collection;

class NotificationController extends Controller
{
    public function index()
    {
        
        if (request()->ajax()) {
            $notifications1 = Notification::where('flag',0)->orderBy('created_at','desc')->get();

            $notifications = new Collection;
            foreach($notifications1 as $notification) {
                $notifications->push([
                    'id'    => $notification->id,
                    'title'  => $notification->title,
                    'message'  => $notification->message,
                    'created_at' =>  date('d-m-Y', strtotime($notification->created_at))
                ]);    
            }

            return Datatables::of($notifications)
                ->make(true);
        }

        return view('backend.notification.index');
    }

    public function notificationListItems()
    {
        $notifications1 = Notification::where('flag',0)->orderBy('created_at','desc')->get();

        $notifications = array();
        foreach($notifications1 as $notification) {
           if($notification->title == "New User") {
              array_push($notifications,$this->newUserTemplate($notification));      
           }     
           if($notification->title == "New Order") {
            array_push($notifications,$this->newOrderNotificationTemplate($notification));      
           }  
           if($notification->title == "Order Return") {
            array_push($notifications,$this->returnTemplate($notification));      
           }    
        } 
        
        return response()->json($notifications);
    }

    public function newUserTemplate($notification)
    {
        $html = '<!--begin::Item-->
                    <div class="d-flex align-items-center bg-hover-lighten py-3 px-9">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40px symbol-circle me-5">
                        <span class="symbol-label bg-light-info">
                        <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                        <span class="svg-icon svg-icon-info svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="mb-1 pe-3 flex-grow-1">
                        <a href="#" class="fs-6 text-dark text-hover-primary fw-bold">'.$notification->message.'</a>
                        <div class="text-gray-400 fw-bold fs-7">'.\Carbon\Carbon::parse($notification->created_at)->diffForhumans().'</div>
                    </div>
                    <!--end::Title-->
                    </div>
                <!--end::Item-->';
        return $html;        
    }

    public function newOrderNotificationTemplate($notification)
    {
        $html = '<!--begin::Item-->
                    <div class="d-flex align-items-center bg-hover-lighten py-3 px-9">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40px symbol-circle me-5">
                        <span class="symbol-label bg-light-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart3.svg-->
                        <span class="svg-icon svg-icon-primary svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                            </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Title-->
                    <div class="mb-1 pe-3 flex-grow-1">
                        <a href="#" class="fs-6 text-dark text-hover-primary fw-bold">'.$notification->message.'</a>
                        <div class="text-gray-400 fw-bold fs-7">'.\Carbon\Carbon::parse($notification->created_at)->diffForhumans().'</div>
                    </div>
                    <!--end::Title-->
                    </div>
                <!--end::Item-->';
        return $html;        
    }

    public function returnTemplate($notification)
    {
        $html = '<!--begin::Item-->
                <div class="d-flex align-items-center bg-hover-lighten py-3 px-9">
                <!--begin::Symbol-->
                <div class="symbol symbol-40px symbol-circle me-5">
                    <span class="symbol-label bg-light-primary">
                    <!--begin::Svg Icon | path: icons/duotone/General/Update.svg-->
                    <span class="svg-icon svg-icon-primary svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Title-->
                <div class="mb-1 pe-3 flex-grow-1">
                    <a href="#" class="fs-6 text-dark text-hover-primary fw-bold">'.$notification->message.'</a>
                    <div class="text-gray-400 fw-bold fs-7">'.\Carbon\Carbon::parse($notification->created_at)->diffForhumans().'</div>
                </div>
                <!--end::Title-->
                </div>
                <!--end::Item-->';
        return $html;        
    }

    public function destroy(Notification $notification)
    {
        //
    }
}
