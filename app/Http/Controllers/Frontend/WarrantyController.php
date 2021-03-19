<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Warranty;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index(){
        return view('frontend.warranty');
    }

    public function submit(Request $request){
        $validated = $request->validate([
            'name'  => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'merk_barang' => 'required',
            'nama_barang' => 'required',
            'serial_number' => 'required',
            'detail_kerusakan' => 'required',
            'foto_barang_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_barang_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "file_nota_pembelian" => "required|mimetypes:application/pdf|max:2048"
        ]);

        $data = $request->all();

        $data['type'] = "warranty";
        $data['status'] = "DATA MASUK / BARANG DALAM PERJALANAN";
        $data['rma_id'] = Helper::generateCode('warranty');


        if($request->has('file_nota_pembelian')){
            $data['file_nota_pembelian'] = $request->file('file_nota_pembelian')->store('public/files');
        }

        if($request->has('foto_barang_1')){
            $data['foto_barang_1'] = $request->file('foto_barang_1')->store('public/files');
        }

        if($request->has('foto_barang_2')){
            $data['foto_barang_2'] = $request->file('foto_barang_1')->store('public/files');
        }


        $warranty = Warranty::create($data);

        if(!$warranty){
            return redirect(route('warranty.index'))->withErrors(['msg', 'Gagal membuat klaim RMA']);
            
        }

        return redirect(route('warranty.show',['rmaId'=>$warranty->rma_id]));
        
    }

    public function show(Request $request,$rmaId){
        $data = Warranty::where("type","warranty")->where("rma_id",$rmaId)->first();

        if(!$data){
            return abort(404);
        }

        return view('frontend.warranty-show')->with(compact('data'));
    }

    public function download(Request $request,$rmaId){
        $data = Warranty::where("type","warranty")->where("rma_id",$rmaId)->first();

        if(!$data){
            return abort(404);
        }

        $pdf = PDF::loadView('frontend.warranty-print',compact('data'));

        return $pdf->download('rma-'.$rmaId.'.pdf');
    }

    public function downloadSample(){
        return view('frontend.print');

        $pdf = PDF::loadView('frontend.print');

        return $pdf->download('rma.pdf');
    }
}
