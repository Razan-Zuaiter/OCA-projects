<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->get();

        return view('pages.shop', compact('categories', 'products'));
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

    public function search(Request $request)
    {

        $search = $request->input('search');

        $categories = Category::all();



        $product = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->get();

        $products = Product::query('product_name', 'product_image', 'product_price')
            ->where('product_name', 'LIKE', "%{$search}%")
            ->get();

        //dd($search);

        return view('pages.shop', compact('products', 'product', 'categories'));
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

    public function getProductByCatID($id)
    {
    }
}
