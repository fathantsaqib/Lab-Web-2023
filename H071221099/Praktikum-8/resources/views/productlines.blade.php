@extends('layouts.main')
<style>
    .container1 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: #008bc2;
        width: 650px;
        padding: 1.4rem;
        border-radius: 10px;
        border: 1px solid #f7f7f7;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    ul li {
        list-style: none;
        justify-content: center;
    }
</style>
@section('container')
    <h1 class="mt-4" style="color: #fff">Hasil Pencarian Produk : </h1>
    @foreach ($products as $product)
        <center>
            <ul class="container1 mt-4">
                <a href="{{ route('show', $product->productName) }}"
                    style="color: #302ebd"><li style="color: #fff">{{ $product->productName }}</li></a>
            </ul>
        </center>
    @endforeach
    <a href="/" class="btn btn__main mt-4 mb-4" style="background-color: #008bc2">Back to home</a>
@endsection
