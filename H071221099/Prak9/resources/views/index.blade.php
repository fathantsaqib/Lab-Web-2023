@extends('layout/template')



@section('content')
<h1 class="text-center mt-5">DAFTAR PRODUK</h1>
<a href="{{ url('product/create') }}" class="btn btn-info mt-5">Tambah Produk</a>
@if(Session::has('success'))   
  <p class="alert alert-success mt-3">{{ Session::get('success') }}</p>
@endif

<form method="GET" action="{{ url('product') }}">
  <input type="text" name="keyword" class="form-control mt-3" style="width: 40%" value="{{ $keyword }}">
  <button type="submit" class="btn btn-success mt-1">Cari</button>
</form>
<table class="table mt-5 mt-5">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Aksi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item => $value)   
      <tr>
        <th scope="row">{{ $loop -> iteration }}</th>
        <td><a href="{{ url('product/'.$value->id.'/details') }}">{{ $value -> nama }}</a></td>
        <td>{{ $value -> harga }}</td>
        <td>{{ $value -> stok }}</td>
        <td>
            <a href="{{ url('product/'.$value->id.'/edit') }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
            <form action="{{ url('product/'.$value -> id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products -> links()}}
@endsection