@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Form Tambah Data
        </div>
        <div class="card-body">
            <form action="{{ route('drivers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_driver">Nama Driver</label>
                    <input type="text" name="nama_driver" class="form-control" value="{{ old('nama_driver') }}">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" class="form-control" value="{{ old('umur') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="free">Free</option>
                        <option value="onduty">OnDuty</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar_lisence">Driver Lisence</label>
                    <input type="file" class="form-control" name="gambar_lisence">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn" style="background-color: #4F6F52; color: #ECE3CE">Simpan</button>
                </div>
            </form>
        </div>
    </div> 
@endsection


