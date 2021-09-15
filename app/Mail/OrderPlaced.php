<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $order_no, $message, $order, $image)
    {
        $this->name = $name;
        $this->order_no = $order_no;
        $this->messages = $message;
        $this->order = $order;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order_placed')
            ->from('webanixnew@gmail.com', 'makeuptest')
            ->subject('Order no. is ' . $this->order_no)
            ->with([
                'messages' => $this->messages,
                'order' => $this->order,
                'image'  => $this->image,
            ]);
    }
}
