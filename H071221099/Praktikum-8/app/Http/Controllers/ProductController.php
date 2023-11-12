<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    #mengambil data dari product
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    #mengambil data yg dmna saat kita mencari data akan menampilkan semua nama product yg sama
    public function search(Request $request)
    {
        $productLine = $request->input('productLine'); // Ambil nilai yang diinputkan pengguna

        $products = Product::where('productLine', $productLine)->get();

        return view('productlines', ['products' => $products]);
    }

    # info detail product berdasarkan yg dicari 
    public function showProduct($productName)
    {
        $product = Product::where('productName', $productName)->first();   //akan mengambil pencarian yg pertama yg muncul

        return view('show', ['product' => $product]);
    }
}
