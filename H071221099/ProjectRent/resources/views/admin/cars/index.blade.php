@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center;">
            <h3>Daftar Mobil</h3>
            <a href="{{route('cars.create')}}" class="btn" style="background-color: #4F6F52; color: #ECE3CE">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Gambar Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Status Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car)
                        <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$car->nama_mobil}}</td>
                            <td>
                                <img src="{{Storage::url($car->gambar)}}" width="200">
                            </td>
                            <td>{{ $car->harga_sewa}}</td>
                            <td>{{ $car->status}}</td>
                            <td>
                                <a href="{{route('cars.edit', $car->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <form onclick="return confirm('apakah anda yakin untuk menhapus data ini')" class="d-inline" action="{{ route('cars.destroy', $car->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan='6' class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection