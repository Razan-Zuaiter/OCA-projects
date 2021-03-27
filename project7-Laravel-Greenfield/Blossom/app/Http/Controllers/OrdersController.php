<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use App\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(auth()->user()->id)) {
            return view('pages.checkout');
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $total = 0;
        $order = new Order;
        $order->id = $userId;
        foreach (session('cart') as $key => $value) {
            $total += $value['price'] * $value['quantity'];
            $order->pro_id = $value['id'];
            $order->total = $total;
            $order->location = $request->input('location');
            $order->ship_date = $request->input('date');
            $order->save();
            $lastOrder = DB::table('orders')->latest('created_at')->first()->order_id;
            $orderPro = new OrderProduct();
            $orderPro->order_id = $lastOrder;
            $orderPro->pro_id = $value['id'];
            $orderPro->quantity = $value['quantity'];
            $orderPro->save();
        };
        session()->forget('cart');
        return view('pages.thankYou')->with('Success', 'Order has been placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
