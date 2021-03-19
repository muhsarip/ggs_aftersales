<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index( Warranty $warranty){
        return view('frontend.status',compact('warranty'));
    }

    public function check(Request $request){

        if($request->number == ''){
            return redirect(route('page.status'))->with(['errors'=>'No. RMA/ No. Service tidak ditemukan']);
        }

        $warranty = Warranty::where('rma_id',$request->number)->orWhere("ser_id",$request->number)->where("email",$request->email)->first();

        if(!$warranty){
            return redirect(route('page.status'))->with(['errors'=>'No. RMA/ No. Service tidak ditemukan']);
        }

        return redirect(route('page.status'))->with(['instance'=>$warranty]);
    }
}
