<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function brands(Request $request, Category $category)
    {
        return response()->json($category->brands);
    }
}
