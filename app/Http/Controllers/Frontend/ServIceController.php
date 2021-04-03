<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Setting;
use App\Models\Warranty;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);

        return view('frontend.service', compact('setting'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'nama_barang' => 'required',
            'serial_number' => 'required',
            'detail_kerusakan' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $data = $request->all();

        $data['type'] = "service";
        $data['status'] = "DATA MASUK / BARANG DALAM PERJALANAN";
        $data['ser_id'] = Helper::generateCode('service');

        $warranty = Warranty::create($data);

        if (!$warranty) {
            return redirect(route('service.index'))->withErrors(['msg', 'Gagal membuat data Service']);
        }

        return response()->json($warranty);
    }

    public function show(Request $request, $serId)
    {
        $data = Warranty::where("type", "service")->where("ser_id", $serId)->first();

        if (!$data) {
            return abort(404);
        }

        return view('frontend.service-show')->with(compact('data'));
    }
}
