<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Models\Category;
use App\Models\Setting;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WarrantyController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $categories = Cache::rememberForever('categories',  function () {
            return Category::all();
        });
        return view('frontend.warranty', compact('setting', 'categories'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'category_id'  => 'required',
            'brand_id'  => 'required',
            'name'  => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
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

        Cache::forget('dashboard-chart-data');


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
