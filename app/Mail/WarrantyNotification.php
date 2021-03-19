<?php

namespace App\Mail;

use App\Models\Warranty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarrantyNotification extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Warranty $warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $warranty = $this->warranty;
        return $this->subject(config('app.name'))->view('admin.warranty.mail',compact('warranty'));
    }
}
