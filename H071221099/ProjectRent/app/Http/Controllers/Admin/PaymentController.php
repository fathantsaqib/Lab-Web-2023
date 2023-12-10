<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->get();

        return view('admin.payments.index', compact('payments')); 
    }

    public function approvePayment(Payment $payment)
    {
        // Validasi apakah pembayaran sudah disetujui sebelumnya
        if ($payment->status === 'disetujui') {
            return redirect()->back()->with([
                'message' => 'Pembayaran sudah disetujui sebelumnya.',
                'alert-type' => 'warning',
            ]);
        }

        // Mengubah status pembayaran menjadi disetujui
        $payment->update(['status' => 'disetujui']);

        // Mengubah status mobil menjadi tidak tersedia
        $car = $payment->car;
        $car->update(['status' => 'tidak tersedia']);

        // Jika driver dipilih, ubah status driver menjadi tidak tersedia
        if ($payment->sewa_driver) {
            $driver = $payment->driver;
            $driver->update(['status' => 'tidak tersedia']);
        }

        return redirect()->back()->with([
            'message' => 'Pembayaran berhasil disetujui.',
            'alert-type' => 'success',
        ]);
    }

    public function rejectPayment(Payment $payment)
    {
        // Validasi apakah pembayaran sudah ditolak sebelumnya
        if ($payment->status === 'ditolak') {
            return redirect()->back()->with([
                'message' => 'Pembayaran sudah ditolak sebelumnya.',
                'alert-type' => 'warning',
            ]);
        }

        // Mengubah status pembayaran menjadi ditolak
        $payment->update(['status' => 'ditolak']);

        // Mengubah status mobil menjadi tersedia
        $car = $payment->car;
        $car->update(['status' => 'tersedia']);

        // Jika driver dipilih, ubah status driver menjadi tersedia
        if ($payment->sewa_driver) {
            $driver = $payment->driver;
            $driver->update(['status' => 'tersedia']);
        }

        return redirect()->back()->with([
            'message' => 'Pembayaran berhasil ditolak.',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->back()->with([
            'message' => 'data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }
} 
