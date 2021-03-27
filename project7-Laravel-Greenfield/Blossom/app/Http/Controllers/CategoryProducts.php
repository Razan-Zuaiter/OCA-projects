<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\DB;
use App\Product;

use Illuminate\Http\Request;

class CategoryProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categories = Category::all();
        $products = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->get();
        $product = Product::find($id);
        // dd($products);

        $catProducts = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->where('categories.cat_id', '=', $id)
            ->get();


        return view('pages.categoryProduct', compact('catProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
