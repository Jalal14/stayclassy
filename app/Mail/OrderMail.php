<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $order;
    public function __construct($id)
    {
        echo $id;
        $this->order = DB::table('view_order')
            ->where('id', $id)
            ->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.pdf-page')
            ->with('order', $this->order)
            ->from('turingShop@gmx.com')
            ->subject('Order confirmation')
            ->to($this->order->email);
    }
}
