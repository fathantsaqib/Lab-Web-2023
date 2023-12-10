@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    Form Edit Data
                </div>
                <div class="card-body">
                    <form action="{{ route('drivers.update', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_driver">Nama Driver</label>
                            <input type="text" name="nama_driver" class="form-control" value="{{ old('nama_driver', $driver->nama_driver) }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option {{ $driver->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                <option {{ $driver->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="number" name="umur" class="form-control" value="{{ old('umur', $driver->umur) }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{ $driver->status == 'free' ? 'selected' : '' }} value="free">Free</option>
                                <option {{ $driver->status == 'onduty' ? 'selected' : '' }} value="onduty">OnDuty</option>
                            </select>
                        </div>
                        <div class="div form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Form Edit Gambar
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.drivers.updateImage', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <img src="{{ Storage::url($driver->gambar_lisence) }}" class="img-fluid" alt="Alhamudulillah">
                        </div>
                        <div class="form-group">
                            <label for="gambar_lisence">Gambar Lisence</label>
                            <input type="file" class="form-control" name="gambar_lisence">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection
