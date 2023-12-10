@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background-color: #4F6F52">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder" style="color: #ECE3CE">Sewa Mobil</h1>
        <p class="lead fw-normal mb-0" style="color: #ECE3CE">
          hanya dengan satu sentuhan
        </p>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <h3 class="text-center mb-5" style="color:#3A4D39">Daftar Mobil</h3>
      <div
        class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
      >@foreach ($cars as $car)
        <div class="col mb-5">
          <div class="card h-100">
            <!-- Sale badge-->
            <div
              class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
              style="top: 0; right: 0"
            >
              {{ $car->status }}
            </div>
            <!-- Product image-->
            <img
              class="card-img-top"
              src="{{ Storage::url($car->gambar) }}"
              alt="{{ $car->nama_mobil }}"
              style="object-fit: contain; height: 15rem;"
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder" style="color:#3A4D39">{{ $car->nama_mobil }}</h5>
                <!-- Product price-->
                <div class="rent-price mb-3">
                  <span class="text" style="color: #739072">Rp.{{ number_format($car->harga_sewa) }}/</span>day
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Bahan bakar</span>
                    <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Jumlah Kursi</span>
                    <span style="font-weight: 600">{{ $car->jumlah_kursi }}</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>Transmisi</span>
                    <span style="font-weight: 600">{{ $car->transmisi }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent mb-3">
              <div class="text-center">
                <a class="btn mt-auto text-white" style="background-color: #739072" href="{{ route('pay') }}">Sewa</a>
                <a
                  class="btn mt-auto"
                  style="background-color: #ECE3CE" 
                  href="{{ route ('detail', $car->slug) }}"
                  >Detail</a
                >
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </section>
@endsection