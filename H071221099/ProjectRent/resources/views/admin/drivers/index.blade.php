@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Driver</h3>
            <a href="{{ route('drivers.create')}}" class="btn" style="background-color: #4F6F52; color: #ECE3CE">Tambah Data</a>        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Driver</th>
                            <th>Lisence</th>
                            <th>Status Driver</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drivers as $driver)
                            <tr>
                                <td> {{$loop->iteration}}</td>
                                <td> {{$driver->nama_driver}}</td>
                                <td>
                                    <img src="{{Storage::url($driver->gambar_lisence)}}" width="150" alt='{{ $driver->gambar_lisence }}'>
                                </td>
                                <td> {{$driver->status}}</td>
                                <td>
                                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('apakah anda yakin untuk menhapus data ini')" class="d-inline" action="{{ route('drivers.destroy', $driver->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection