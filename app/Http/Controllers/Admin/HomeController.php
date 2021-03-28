<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $statuses = config('warranty.status');
        $widgets = [];

        foreach ($statuses as $status) {
            $isComplete = false;
            $count = Warranty::where("status", $status)->count();
            if ($status == 'BARANG SUDAH DIKIRMKAN KE USER / SELESAI') {
                $isComplete = true;
            }
            $widgets[] = (object)[
                'label' => $status,
                'number' => $count,
                'isComplete' => $isComplete,
                'url' => url('/admin/warranties?status=' . $status)
            ];
        }
        return view('admin.home', compact('widgets'));
    }
}
