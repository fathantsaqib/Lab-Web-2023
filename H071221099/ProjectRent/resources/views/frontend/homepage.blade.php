@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background-color: #4F6F52">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder" style="color: #ECE3CE">CaRenThann</h1>
        <p class="lead fw-normal mb-0" style="color: #ECE3CE">
          sewa mobil hanya dengan satu sentuhan(maybe)
        </p>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section> 
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('storage/images/poto.png')}}" class="d-block w-50" alt="...">
        </div>
        <div class="carousel-item ">
          <img src="{{asset('storage/images/potooo.png')}}" class="d-block w-50" alt="...">
        </div>
        <div class="carousel-item ">
          <img src="{{asset('storage/images/pooto.png')}}" class="d-block w-50" alt="...">
        </div>
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

@endsection