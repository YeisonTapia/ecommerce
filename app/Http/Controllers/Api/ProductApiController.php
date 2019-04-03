<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::name($request->name)->get();
		return response()->json($products);        
    }

   	public function show(Product $product)
    {
        return response()->json($product);
    }

    public function getForCategory (Category $category) 
    {
    	$products = Product::where('category_id', $category->id)->get();
    	return response()->json($products);
    }
}
