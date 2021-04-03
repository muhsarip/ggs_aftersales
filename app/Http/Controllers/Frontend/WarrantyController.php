<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Setting;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('frontend.warranty', compact('setting'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'merk_barang' => 'required',
            'nama_barang' => 'required',
            'serial_number' => 'required',
            'detail_kerusakan' => 'required',
            "file_nota_pembelian" => "required",
            'captcha' => 'required|captcha'
        ]);

        $data = $request->all();

        $data['type'] = "warranty";
        $data['status'] = "DATA MASUK / BARANG DALAM PERJALANAN";
        $data['rma_id'] = Helper::generateCode('warranty');


        $warranty = Warranty::create($data);

        if (!$warranty) {
            return redirect(route('warranty.index'))->withErrors(['msg', 'Gagal membuat klaim RMA']);
        }

        return response()->json($warranty);
    }

    public function show(Request $request, $rmaId)
    {
        $data = Warranty::where("type", "warranty")->where("rma_id", $rmaId)->first();

        if (!$data) {
            return abort(404);
        }

        return view('frontend.warranty-show')->with(compact('data'));
    }
}
