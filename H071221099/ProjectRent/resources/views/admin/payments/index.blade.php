@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center;">
            <h3>Payment</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Total Payment</th>
                            <th>Bukti Pembayaran</th>
                            <th>Nama Mobil</th>
                            <th>Nama Driver</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                        <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$payment->nama}}</td>
                            <td> {{$payment->email}}</td>
                            <td> {{$payment->tanggal}}</td>
                            <td>
                                <img src="{{asset("storage/assets/payment/$payment->bukti_payment")}}" width="150" alt='{{ $payment->bukti_payment }}'>
                            </td>
                            <td>
                                <td class="align-middle">{{ $payment->car->nama_mobil ?? '-' }}</td>
                                <td class="align-middle">{{ $payment->driver->nama_driver ?? '-' }}</td>
                                <td >
                                    @if ($payment->status !== 'disetujui' && $payment->status !== 'ditolak')
                                        <form action="{{ route('admin.payment.approve', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn" style="background-color: rgb(4, 240, 15); color: black">
                                                Setujui
                                            </button>
                                            <br>
                                        </form>

                                        <form action="{{ route('admin.payment.reject', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning" ; color: black>
                                                Tolak
                                            </button>
                                        </form>
                                        <br>
                                    @else
                                        <button class="btn btn-success" disabled>
                                            Setujui
                                        </button>

                                        <button class="btn btn-danger" disabled>
                                            Tolak
                                        </button>
                                    @endif
                                    <br>
                                    
                                    <form onclick="return confirm('Apakah sudah Mengembalikan Mobil?');" class="d-inline" action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"  color: white">Mengembalikan Mobil</button>
                                    </form>
                                </td>
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

<!-- resources/views/admin/messages/index.blade.php --> 

{{-- @extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center;">
            <h3>Daftar Pemesanan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Mobil</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                        <tr>
                            <td> {{$loop->iteration}}</td>
                            <td> {{$message->nama}}</td>
                            <td> {{$message->nama_mobil}}</td>
                            <td> {{$message->email}}</td>
                            <td> {{$message->subject}}</td>
                            <td>
                                <!-- Formulir untuk meng-update status mobil -->
                                <form action="{{ route('admin.cars.updateStatus', $message->car_id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('patch')
                                    <div class="input-group">
                                        <select class="form-select" name="status" aria-label="Pilih Status">
                                            <option value="available" {{ $message->car->status === 'available' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="booked" {{ $message->car->status === 'booked' ? 'selected' : '' }}>Dipesan</option>
                                            <option value="rented" {{ $message->car->status === 'rented' ? 'selected' : '' }}>Disewa</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                </form>

                                <form onclick="return confirm('apakah anda yakin untuk menhapus data ini')" class="d-inline" action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
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
    
@endsection --}}
