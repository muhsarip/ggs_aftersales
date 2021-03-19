<?php 
namespace App\Libraries;

use App\Mail\WarrantyNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WarrantyService {
    public function sendNotification($warranty){
        if($warranty){
            try{
                Mail::to($warranty->email)
                    ->send(new WarrantyNotification($warranty));
            }catch(\Exception $e){
                Log::error('Mail '.$warranty->no." not sending. Status while sending : ".$warranty->status."error:".$e->getMessage());
            }

        }
    }
}