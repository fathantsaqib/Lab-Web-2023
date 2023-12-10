@extends('layouts.frontend')

<style>
  .pay-section {
    min-height: auto;
  }
  .konten {
    padding: 27.5px 0;
  }
</style>

@section('content')
{{-- <header class="py-5" style="background-color: #4F6F52">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white d-flex justify-content-center">
        <h1 class="display-4 fw-bolder w-75" style="color: #ECE3CE">Silahkan Melakukan Pembayaran yang Sesuai</h1>
      </div>
    </div>
  </header> --}}
  <!-- Section-->
  <section class="pay-section py-5 my-5">
    <div class="container konten px-4 px-lg-5 mt-5">
      @if (session()->has('message'))
      <div class="alert alert-{{session()->get('alert-type')}} alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
      </div>
      @endif
      @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                      </div>
                      @endif
      <div class="row justify-content-center">
        <div class="col-lg-10 m-auto">
          <div class="contact-form">
            <form action="{{route ('contact.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-12 col-md-6 mb-4">
                  <div class="name-input form-group">
                    <input
                      type="text"
                      name="nama"
                      class="form-control"
                      placeholder="Isikan nama lengkap"
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-6 mb-4">
                  <div class="email-input form-group">
                    <input
                      type="email"
                      name="email"
                      class="form-control"
                      placeholder="Isikan alamat email"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-6 mb-4">
                  <div class="subject-input form-group">
                    <input
                      type="text"
                      name="nama_mobil"
                      class="form-control"
                      placeholder="Nama Mobil"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-6 mb-4">
                  <div class="subject-input form-group">
                    <input
                      type="text"
                      name="subject"
                      class="form-control"
                      placeholder="subject"
                    />
                  </div>
                </div>
              </div>
              <div class="input-submit form-group">
                <button
                  type="submit"
                  style="background-color:#739072"
                  class="d-block btn btn-primary"
                  >SEWA</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection