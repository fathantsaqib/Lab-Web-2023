@extends('layout/template')

@section('content')
    <form method="POST" action="{{ url('product') }}">
        @csrf
          <h1 class="text-center mt-5">Tambah Produk</h1>
          
          <div class="mb-3">
            <label for="" class="form-label">Nama Produk :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk">
            @foreach ($errors ->get('nama') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>
          
          <div class="mb-3">
            <label for="">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Porduk" ></textarea>
            @foreach ($errors ->get('deskripsi') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Harga Produk :</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Produk">
            @foreach ($errors ->get('harga') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Stok Produk :</label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Produk">
            @foreach ($errors ->get('stok') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>
        
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="/product" class="btn btn-primary">Kembali</a>
      </form>
@endsection