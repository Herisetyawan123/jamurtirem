<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::get();
        return view('pages.product.index', ['products' => $data]);
    }

    public function tambah()
    {

        return view('pages.product.tambah');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.product.edit', ['product' => $product]);
    }

    public function store(Request $rq)
    {
        $data = $rq->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->photo = $data['photo'];
        $product->harga = $data['harga'];
        $product->description = $data['description'];
        $product->save();
        return back()->with('success', 'data berhasil di tambah');
    }

    public function update(Request $rq)
    {
        $data = $rq->all();
        $product = Product::find($data['id']);
        $product->update($data);
        return back()->with('success', 'data berhasil di perbarui');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'data berhasil di hapus');
    }
}
