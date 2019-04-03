<?php

namespace App\Http\Controllers;

use File;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(20);

        if ($request->ajax()) {
            return response()->json($categories);
        }

        return view ('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = Category::create($request->all());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namefile = time().$file->getClientOriginalName();
            $file->move(public_path().'/image/', $namefile);

            $category->image = $namefile;
            $category->save();
        }

        if ($request->ajax()) {
            return response()->json($category);
        }

        return redirect ('/category')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::pluck('name', 'id');
        return view ('category.show', compact('category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view ('category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {


        //delete olf image file
        if ($request->hasFile('image')) {

            $img = $category->image;

            if(file_exists(public_path('image/'.$img)) && $img != 'default.jpg'){
                //unlink(public_path('images/mi-archivo.jpeg'));
                dd('el archivo existe');
            }else{
                dd('El archivo no existe.');
            }

          
         }
        //$category->fill($request->all());
        //$category->save();
         

         dd('No tiene imagen seleccionada');

        return redirect ('/category')->with('message','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect ('/category')->with('message','delete');

    }
}
