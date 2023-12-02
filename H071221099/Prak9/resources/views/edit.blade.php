@extends('layout/template')

@section('content')
<h1 class="text-center mt-5">Tambah Produk</h1>
    <form method="POST" action="{{ url('product/'.$editProduct->id) }}">
        @csrf
          <input type="hidden" name="_method" value="PATCH">
          <div class="mb-3">
            <label for="" class="form-label">Nama Produk :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk" value="{{ $editProduct -> nama }}">
          </div>
          <div class="mb-3">
            <label for="">Deskripsi Produk</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Porduk" value="{{ $editProduct -> deskripsi }}">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Harga Produk :</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Produk" value="{{ $editProduct -> harga }}">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Stok Produk :</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Produk" value="{{ $editProduct -> stok }}">
          </div>
        
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="/product" class="btn btn-primary">Kembali</a>
      </form>
@endsection