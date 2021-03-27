<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->get();
        // dd($products);
        return view('pages.product', compact('products', 'categories'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'required|min:3',
            'product_price' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->product_image)) {
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.png';
        }
        $var = new Product();
        $var->product_name = $request->input('product_name');
        $var->product_price = $request->input('product_price');
        $var->product_desc = $request->get('product_desc');
        $var->product_quantity = $request->get('product_quantity');
        $var->product_image = $imageName;
        $var->cat_id = $request->input('cat_id');
        $var->save();
        return back()->with('success', 'Product created successfully.');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $products = DB::table('categories')
            ->join('products', 'categories.cat_id', '=', 'products.cat_id')
            ->select('categories.category_name', 'products.*')
            ->get();
        $product = Product::find($id);
        return view('pages.editProdcut', compact('product', 'products', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|min:3',
            'product_price' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!empty(request()->product_image)) {
            $imageName = time() . '.' . request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $imageName);
        } else {
            $product = Product::find($id);
            $imageName = $product->product_image;
        }
        $product = Product::find($id);
        $product->product_name =  $request->get('product_name');
        $product->product_price = $request->get('product_price');
        $product->product_desc = $request->get('product_desc');
        $product->product_quantity = $request->get('product_quantity');
        $product->product_image = $imageName;
        $product->cat_id = $request->input('cat_id');
        $product->save();
        return redirect('/manageProduct')->with('success', 'product updated!');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Category deleted!');
    }
}
