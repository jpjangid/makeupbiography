<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReturnMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $order_no, $message, $order, $item, $image, $status, $subject)
    {
        $this->name = $name;
        $this->order_no = $order_no;
        $this->message = $message;
        $this->order = $order;
        $this->item = $item;
        $this->image = $image;
        $this->status = $status;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.return_order')
            ->from('webanixnew@gmail.com', 'makeuptest')
            ->subject($this->subject)
            ->with([
                'message' => $this->message,
                'order' => $this->order,
                'item' => $this->item,
                'image'  => $this->image,
                'status' => $this->status,
            ]);
    }
}
