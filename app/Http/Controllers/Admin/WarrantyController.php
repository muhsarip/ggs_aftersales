<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = config('warranty.status');
        $warranties = Warranty::with(['distributor']);

        // Filter keyword
        if ($request->keyword != '') {
            $keyword = "%" . $request->keyword . "%";
            $warranties
                ->where("rma_id", "like", $keyword)
                ->orWhere("ser_id", "like", $keyword)
                ->orWhere("name", "like", $keyword);
        }

        // Filter status
        if ($request->status != '') {
            $warranties->where("status", $request->status);
        }

        return view('admin.warranty.index', [
            'warranties' => $warranties->paginate(),
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warranty.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warranty = Warranty::whereId($id)->with(['distributor'])->first();
        return view('admin.warranty.show', compact('warranty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $warranty)
    {
        $distributors = Distributor::all();
        $warranty->load(['category', 'brand']);
        return view('admin.warranty.edit', compact('warranty', 'distributors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warranty $warranty)
    {
        $warranty->update($request->all());

        return redirect()->route('warranties.index')->withSuccess('Berhasil mengupdate ' . $warranty->no);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
