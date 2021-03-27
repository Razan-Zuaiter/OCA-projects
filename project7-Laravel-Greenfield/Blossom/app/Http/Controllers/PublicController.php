<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Prodcut;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
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
        $catPlus5 = DB::table('categories')->where('cat_id', '>=', 6)
            ->get();

        // return View::first(['pages.index', 'shop2'], compact('categories', 'products'));
        return view('pages.index2', compact('categories', 'products', 'catPlus5'));
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
        //
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
