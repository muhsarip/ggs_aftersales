<?php

namespace App\Mail;

use App\Models\Setting;
use App\Models\Warranty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
        $setting = Setting::find(1);
        $text = "";
        $fieldName = "mail_text_status_" . (array_search($warranty->status, config("warranty.status")) + 1);
        if (isset($setting->$fieldName)) {
            $text = $setting->$fieldName;
        }
        //Log::info("text status : " . $text);
        return $this->subject(config('app.name'))->view('admin.warranty.mail', compact('warranty', 'setting', 'text'));
    }
}
