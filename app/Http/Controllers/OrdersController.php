<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.id_customer', '=', 'users.id')
            ->join('products', 'orders.id_product', '=', 'products.id')
            ->select('users.id as id_user', 'users.name as user','products.name as product', 'products.*', 'orders.status',  'orders.id as id')
            ->get();
            // dd($orders);
        return view('pages.order.index', ['orders' => $orders]);
    }

    public function edit($id)
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.id_customer', '=', 'users.id')
            ->join('products', 'orders.id_product', '=', 'products.id')
            ->select('users.id as id_user', 'users.name as user','products.name as product', 'products.id as id_product', 'products.*', 'orders.status', 'orders.id as id')
            ->where('orders.id', $id)
            ->first();
        $product = Product::get();
        return view('pages.order.edit', ['order' => $orders, 'products' => $product]);
    }

    public function update(Request $rq)
    {
        $data = $rq->all();
        $product = Order::find($data['id']);
        $product->update([
            'id_product' => $data['id_product'],
            'status' => $data['status'],
        ]);
        return back()->with('success', 'data berhasil di perbarui');
    }
}
