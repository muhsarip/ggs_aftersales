<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Brand;
use App\Models\Models\Category;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $statuses = config('warranty.status');
        $widgets = [];

        $categories = Cache::rememberForever('categories',  function () {
            return Category::all();
        });

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
        return view('admin.home', compact('widgets', 'categories'));
    }

    public function byAll(Request $request)
    {
        if ($request->year == '' && $request->month == '') {
            $data = Cache::rememberForever('dashboard-chart-data', function () use ($request) {
                $categories = Category::orderBy("name");


                $categories = $categories->withCount('services')->get();

                $labels = $categories->map(function ($item) {
                    return $item->name;
                });

                $values = $categories->map(function ($item) {
                    return $item->services_count;
                });

                return compact('labels', 'values');
            });

            return response()->json(
                $data
            );
        }

        $categories = Category::orderBy("name");

        $categories->whereHas('services', function ($q) use ($request) {
            if ($request->year != '') {
                $q->whereYear("created_at", $request->year);
            }

            if ($request->month != '') {
                $q->whereYear("created_at", $request->year);
                $q->whereMonth("created_at", $request->month);
            }
        });


        $categories = $categories->withCount('services')->get();

        $labels = $categories->map(function ($item) {
            return $item->name;
        });

        $values = $categories->map(function ($item) {
            return $item->services_count;
        });

        return response()->json(
            compact('labels', 'values')
        );
    }

    public function byCategory(Request $request)
    {

        $brands = Brand::orderBy("name");

        $brands->whereHas('services', function ($q) use ($request) {
            $q->where("category_id", $request->category);

            if ($request->year != '') {
                $q->whereYear("created_at", $request->year);
            }

            if ($request->month != '') {
                $q->whereYear("created_at", $request->year);
                $q->whereMonth("created_at", $request->month);
            }
        });


        $brands = $brands->withCount('services')->get();

        $labels = $brands->map(function ($item) {
            return $item->name;
        });

        $values = $brands->map(function ($item) {
            return $item->services_count;
        });

        return response()->json(
            compact('labels', 'values')
        );
    }
}
