<?php 
namespace App\Libraries;

use App\Models\Warranty;

class Helper {


    static function generateCode($type="warranty"){
        $maxDigit = 7;
        $preCode = "RMA";
        if($type == "service"){
            $preCode = "SER";
        }


        // last court tye rma
        $count = Warranty::where("type",$type)->count();

        $nextNumber = $count+1;
        
        return $preCode."-".str_pad($nextNumber,$maxDigit,"0", STR_PAD_LEFT);  
    }
}