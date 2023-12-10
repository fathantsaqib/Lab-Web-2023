@extends('user.front')

@section('content')
<header class="py-5" style="background-color: #4F6F52">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder" style="color: #ECE3CE">Detail Mobil</h1>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-5">
          <div class="card h-100">
            <!-- Product image-->
            <img
              class="card-img-top"
              src="{{ Storage::url($car->gambar) }}"
              alt="{{ $car->nama_mobil }}"
            />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div>
                <!-- Product name-->
                <h3 class="fw-bolder text-primary">Deskripsi</h3>
                <p>
                  {{$car->deskripsi}}                
                </p>
                <div class="mobil-info-list border-top pt-4">
                  <ul class="list-unstyled">
                    <li>
                      @if($car->p3k)
                      <i class="ri-checkbox-circle-line"></i>
                      <span>P3K</span>
                      @else
                      <i class="ri-close-circle-line text-secondary"></i>
                      <span>P3K</span>
                      @endif
                    </li>
                    <li>
                      @if($car->charger)
                      <i class="ri-checkbox-circle-line"></i>
                      <span>CHARGER</span>
                      @else
                      <i class="ri-close-circle-line text-secondary"></i>
                      <span>CHARGER</span>
                      @endif
                    </li>
                    <li>
                      @if($car->audio)
                      <i class="ri-checkbox-circle-line"></i>
                      <span>AUDIO</span>
                      @else
                      <i class="ri-close-circle-line text-secondary"></i>
                      <span>AUDIO</span>
                      @endif
                    </li>
                    <li>
                      @if($car->ac)
                      <i class="ri-checkbox-circle-line"></i>
                      <span>AC</span>
                      @else
                      <i class="ri-close-circle-line text-secondary"></i>
                      <span>AC</span>
                      @endif
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card">
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
              <div class="text-center">
                <!-- Product name-->
                <div
                  class="d-flex justify-content-between align-items-center"
                >
                  <h5 class="fw-bolder">Special Item</h5>
                  <div class="rent-price mb-3">
                    <span style="font-size: 1rem; color:#4F6F52" class="text"
                      >Rp.{{ number_format($car->harga_sewa) }}</span
                    >/day
                  </div>
                </div>
                <ul class="list-unstyled list-style-group">
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>{{ $car->bahan_bakar }}</span>
                    <span style="font-weight: 600">Bensin</span>
                  </li>
                  <li
                    class="border-bottom p-2 d-flex justify-content-between"
                  >
                    <span>{{ $car->jumlah_kursi }}</span>
                    <span style="font-weight: 600">5</span>
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
            {{-- <div class="card-footer border-top-0 bg-transparent">
              <div class="text-center">
                <a
                  class="btn d-flex align-items-center justify-content-center mt-auto"
                  href="#"
                  style="column-gap: 0.4rem; background-color:#4F6F52; color:#ECE3CE"
                  >Sewa Mobil <i class="ri-whatsapp-line"></i
                ></a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection