<?php

namespace App\Http\Controllers;

use App\Category;
use App\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $list_categories = Category::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = Category::create([
                        'name' => $request->name,
                        'slug' => Str::slug($request->name, '-'),
                    ]);

        //log
        Log::create([
            'page' => '-',
            'action' => 'create',
            'description' => Auth::user()->email.' menambahkan category dengan id = '.$category->id,
            'database' => 'categories',
            'author' => Auth::user()->email,
        ]);

        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name, '-'),
                ]);

        $category = Category::find($request->id);

        //log
        Log::create([
            'page' => '-',
            'action' => 'update',
            'description' => Auth::user()->email.' mengubah category dengan id = '.$category->id,
            'database' => 'categories',
            'author' => Auth::user()->email,
        ]);

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $get_category = Category::find($request->id);

        //log
        Log::create([
            'page' => '-',
            'action' => 'delete',
            'description' => Auth::user()->email.' menghapus category dengan nama = '.$get_category->name,
            'database' => 'categories',
            'author' => Auth::user()->email,
        ]);

        $category = Category::destroy($request->id);

        return $category;
    }
}
