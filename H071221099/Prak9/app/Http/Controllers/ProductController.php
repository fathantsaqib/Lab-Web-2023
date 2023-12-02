<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller //--resources
{
    public function index(Request $request){
        $keyword = $request->keyword;
        // $products = Product::all();
        $products = Product::where('nama','LIKE','%'.$keyword.'%')->paginate();
        return view('index', compact('products','keyword'));
    }

    public function create(){
        $addProduct = new Product;
        return view('create', compact('addProduct'));
    }

    public function store(ProductRequest $request){
        $product = new Product;
        $product -> nama = $request -> nama;
        $product -> deskripsi = $request -> deskripsi;
        $product -> harga = $request -> harga;
        $product -> stok = $request -> stok;
        $product -> save();

        return redirect('product')->with('success',"Data berhasil disimpan");
    }
    
    public function edit($id){
        $editProduct = Product::find($id);
        return view('edit', compact('editProduct'));
    }

    public function update(ProductRequest $request, $id){
        $product = Product::find($id);
        $product -> nama = $request -> nama;
        $product -> deskripsi = $request -> deskripsi;
        $product -> harga = $request -> harga;
        $product -> stok = $request -> stok;
        $product -> save();
    
        return redirect('product')->with('success',"Data berhasil diperbaharui");
    }

    public function destroy($id){
        $deleteProduct = Product::find($id);
        $deleteProduct -> delete();
        return redirect('product');
    }

    public function show($id){
        $detailProduct = Product::find($id);
        return view('details', compact('detailProduct'));
    }
}
