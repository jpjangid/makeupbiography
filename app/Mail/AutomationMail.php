<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutomationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $coupon_code, $to_email, $days, $offer)
    {
        $this->name = $name;
        $this->coupon_code = $coupon_code;
        $this->to_email = $to_email;
        $this->days = $days;
        $this->offer = $offer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Discount')
        ->from('webanixnew@gmail.com', 'makeuptest')
        ->subject('Discount'.$this->coupon_code)
        ->with([
			'coupon_code' => $this->coupon_code,
            'offer' => $this->offer,
            'days' => $this->days,     
			'name' => $this->name,
        ]);
    }
}
