<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Controllers\Message;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        return view('frontend.payment', compact('payments'));
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
    public function paymentStore(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'nama_mobil' => 'required',
                'total_payment' => 'required',
                'bukti_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('bukti_payment')) {
                $image = $request->file('bukti_payment');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                // Sesuaikan direktori penyimpanan sesuai kebutuhan Anda
                $image->storeAs('assets/payment', $imageName, 'public');

                // Simpan data ke database
                Payment::create([
                    'nama' => $request->input('nama'),
                    'nama_mobil' => $request->input('nama_mobil'),
                    'bukti_payment' => $imageName,
                ]);
            }

            return redirect()->back()->with([
                'message' => 'Pesanan Anda berhasil dikirim',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan, misalnya catat ke log
            Log::error('Error during paymentStore: ' . $e->getMessage());

            // Kembalikan respons dengan pesan kesalahan
            return redirect()->back()->with([
                'message' => 'Terjadi kesalahan. Pesanan tidak berhasil dikirim.',
                'alert-type' => 'error',
            ]);
        }
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
    public function destroy(string $id)
    {
        //
    }
}
