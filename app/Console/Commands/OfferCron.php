<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Cart;
use App\Models\Coupon;
use App\Mail\AutomationMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class OfferCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron for offer mail automation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $startTime = date("Y-m-d H:i:s");
        $users = User::where([['auto_page', '!=', null]])->get();
        foreach ($users as $user) {
            $auto_page = $user->auto_page;
            $automation_date_time = $user->auto_datetime;
            $automation_time = strtotime($startTime);
            $cenvertedTime = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime($automation_date_time)));
            $converted_time = strtotime($cenvertedTime);
            if ($automation_time > $converted_time) {
                if ($auto_page == 'cart') {
                    $number_day = 7;
                    $discount = 10;

                    $coupon_code = $this->coupon_code_generater();
                    $start_date = date("Y-m-d");
                    $end_date = date('Y-m-d', strtotime('+' . $number_day . ' days'));
                    $end_date = $end_date;
                    $start_time = '00:00:00';
                    $end_time = '23:59:59';
                    $week_days = 'sunday,monday,tuesday,wednesday,thursday,friday,saturday';

                    // Cart data showing in email content and creating offer
                    $carts = Cart::where('user_id', $user->id)->get();

                    if (!empty($carts)) {
                        Coupon::create([
                            'name'                  => "Discount " . Str::random(12),
                            'code'                  => $coupon_code,
                            'type'                  => 'customer_based',
                            'user_id'               => $user->id,
                            'offer_start'           => $start_date,
                            'offer_end'             => $end_date,
                            'days'                  => $week_days,
                            'coupon_limit'          => 1,
                            'discount'              => $discount,
                            'disc_type'             => 'percent',
                            'show_in_front'         => 1
                        ]);


                        $automateuser = User::find($user->id);
                        $automateuser->auto_page = null;
                        $automateuser->auto_datetime = null;
                        $automateuser->auto_email = $automateuser->auto_email + 1;
                        $automateuser->save();
                        $this->sendOfferMail($automateuser, $coupon_code, $number_day, $discount);
                    }
                }

                if ($auto_page == 'checkout') {
                    $number_day = 7;
                    $discount = 10;
                    $coupon_code = $this->coupon_code_generater();
                    $start_date = date("Y-m-d");
                    $end_date = date('Y-m-d', strtotime('+' . $number_day . ' days'));
                    $end_date = $end_date;
                    $start_time = '00:00:00';
                    $end_time = '23:59:59';
                    $week_days = 'sunday,monday,tuesday,wednesday,thursday,friday,saturday';

                    // Cart data showing in email content
                    $carts = Cart::where('user_id', $user->id)->get();
                    if (!empty($carts)) {
                        Coupon::create([
                            'name'                  => "Discount " . Str::random(12),
                            'code'                  => $coupon_code,
                            'type'                  => 'customer_based',
                            'user_id'               => $user->id,
                            'offer_start'           => $start_date,
                            'offer_end'             => $end_date,
                            'days'                  => $week_days,
                            'coupon_limit'          => 1,
                            'discount'              => $discount,
                            'disc_type'             => 'percent',
                            'show_in_front'         => 1
                        ]);

                        $automateuser = User::find($user->id);
                        $automateuser->auto_page = null;
                        $automateuser->auto_datetime = null;
                        $automateuser->auto_email = $automateuser->auto_email + 1;
                        $automateuser->save();
                        $this->sendOfferMail($automateuser, $coupon_code, $number_day, $discount);
                    }
                }

                if ($auto_page == 'cancel') {
                    $number_day = 7;
                    $discount = 10;
                    $coupon_code = $this->coupon_code_generater();
                    $start_date = date("Y-m-d");
                    $end_date = date('Y-m-d', strtotime('+' . $number_day . ' days'));
                    $end_date = $end_date;
                    $start_time = '00:00:00';
                    $end_time = '23:59:59';
                    $week_days = 'sunday,monday,tuesday,wednesday,thursday,friday,saturday';

                    // Cart data showing in email content
                    $carts = Cart::where('user_id', $user->id)->get();
                    if (!empty($carts)) {
                        Coupon::create([
                            'name'                  => "Discount " . Str::random(12),
                            'code'                  => $coupon_code,
                            'type'                  => 'customer_based',
                            'user_id'               => $user->id,
                            'offer_start'           => $start_date,
                            'offer_end'             => $end_date,
                            'days'                  => $week_days,
                            'coupon_limit'          => 1,
                            'discount'              => $discount,
                            'disc_type'             => 'percent',
                            'show_in_front'         => 1
                        ]);

                        $automateuser = User::find($user->id);
                        $automateuser->auto_page = null;
                        $automateuser->auto_datetime = null;
                        $automateuser->auto_email = $automateuser->auto_email + 1;
                        $automateuser->save();
                        $this->sendOfferMail($automateuser, $coupon_code, $number_day, $discount);
                    }
                }
            }
        }
    }

    public function coupon_code_generater()
    {
        $random_number = mt_rand(100000, 999999);
        $refaral_count = Coupon::where('code', $random_number)->first();
        if ($refaral_count == 0) {
            return $random_number;
        } else {
            $this->coupon_code_generater();
        }
    }

    public function sendOfferMail($data = null, $coupon_code = null, $days = null, $offer = null)
    {
        $name =   $data->name;
        $to_email = $data->email;
        $coupon_code;
        $days;
        $offer;
        Mail::to($to_email)->cc("lakhansharma.webanix@gmail.com")->bcc("mohsinwebanix@gmail.com")->send(
            new AutomationMail(
                $name,
                $coupon_code,
                $to_email,
                $days,
                $offer
            )
        );
    }
}
