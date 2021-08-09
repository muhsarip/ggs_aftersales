<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Brand;
use App\Models\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::with(['brands'])->withCount('brands')->orderBy("name");

        // Filter name
        if ($request->keyword != '') {
            $keyword = "%" . $request->keyword . "%";
            $categories
                ->where("name", "like", $keyword);
        }

        return view('admin.category.index', [
            'categories' => $categories->paginate(),
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required',
        ]);


        Category::create($request->all());

        Cache::forget('categories');

        return redirect()->route('categories.index')->withSuccess('Berhasil menambah kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        Cache::forget('categories');

        return redirect()->route('categories.index')->withSuccess('Berhasil mengupdate ' . $category->name);
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

    public function updateBrands(Request $request, Category $category)
    {
        $brandIds = $request->brands;
        $category->brands()->detach();
        $category->brands()->attach($brandIds);

        return redirect()->route('categories.index')->withSuccess('Berhasil mengupdate ' . $category->name);
    }
}
