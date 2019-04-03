<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::all();
		return response()->json($categories);
    }

   	public function show(Category $category)
    {
        return response()->json($category);
    }
}
