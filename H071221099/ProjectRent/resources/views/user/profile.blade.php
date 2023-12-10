@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="color: black">Profile</h2>
            <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #438888">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #438888">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #438888">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted" style="color: #438888">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label" style="color: #438888">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn" style="background-color:yellow; color: #2c1610">Simpan Perubahan</button>
                <a class="btn mt-auto text-white" href="{{ route('user.index') }}" style="background-color: red" >Back</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('profileForm');
        var originalFormData = new FormData(form);

        form.addEventListener('submit', function (event) {
            var currentFormData = new FormData(form);

            if (isFormDataEqual(originalFormData, currentFormData)) {
                event.preventDefault(); // Prevent form submission

                // Show a confirmation dialog
                var isConfirmed = confirm("Tidak ada perubahan yang diubah. Yakin ingin melanjutkan?");
                
                if (isConfirmed) {
                    // If user confirms, submit the form
                    form.submit();
                }
            }
        });

        function isFormDataEqual(formData1, formData2) {
            if (formData1 && formData2) {
                // Convert FormData objects to JSON strings and compare
                return JSON.stringify([...formData1.entries()]) === JSON.stringify([...formData2.entries()]);
            }
            return false;
        }
    });
</script>
@endsection