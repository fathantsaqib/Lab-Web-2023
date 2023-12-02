@extends('layout.template')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Detail Produk</h1>
    @if($detailProduct)
    <div class="text-center mt-3">
        <img  alt="Gambar Acak" >
    </div>
    <table class="table mt-3">
        <tr>
            <th>Nama Produk</th>
            <td>{{ $detailProduct -> nama }}</td>
        </tr>
        <tr>
            <th>Deskripsi Produk</th>
            <td>{{ $detailProduct -> deskripsi }}</td>
        </tr>
        <tr>
            <th>Harga Produk</th>
            <td>{{ $detailProduct -> harga }}</td>
        </tr>
        <tr>
            <th>Stok Produk</th>
            <td>{{ $detailProduct -> stok }}</td>
        </tr>
    </table>
    {{-- <button type="button" class="btn btn-primary">Beli</button> --}}
    <a href="/product" class="btn btn-primary">Kembali</a>
    @else
    <p>Produk tidak ditemukan.</p>
    @endif
</div>
@endsection
