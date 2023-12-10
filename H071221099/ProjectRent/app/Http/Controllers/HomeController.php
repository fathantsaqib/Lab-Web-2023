<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Message;
use App\Models\Driver;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $cars = Car::latest()->get();
        $drivers = Driver::latest()->get();
        return view ('frontend.homepage', compact ('cars','drivers'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore (Request $request)
    {
        $data = $request->validate([
            'nama'=>'required',
            'nama_mobil'=>'required',
            'email'=>'required',
            'subject'=>'required',
        ]);

        Message::create($data);

        return redirect()->back()->with([
            'message' => 'pesan anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
    }

    public function detail(Car $car)
    {
        return view('frontend.detail', compact('car'));
    }


    public function pay(Car $car)
    {
        return view('frontend.pay', compact('car'));
    }

    // public function payment(Car $car)
    // {
    //     return view('frontend.payment', compact('car'));
    // }

    // public function paymentStore(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'nama' => 'required',
    //             'nama_mobil' => 'required',
    //             'total_payment' => 'required',
    //             'bukti_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         ]);

    //         if ($request->hasFile('bukti_payment')) {
    //             $image = $request->file('bukti_payment');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();

    //             // Sesuaikan direktori penyimpanan sesuai kebutuhan Anda
    //             $image->storeAs('assets/payment', 'public');

    //             // Simpan data ke database
    //             Message::create([
    //                 'nama' => $request->input('nama'),
    //                 'nama_mobil' => $request->input('nama_mobil'),
    //                 'total_payment' => $request->input('total_payment'),
    //                 'bukti_payment' => $imageName,
    //             ]);
    //         }

    //         return redirect()->back()->with([
    //             'message' => 'Pesanan Anda berhasil dikirim',
    //             'alert-type' => 'success',
    //         ]);
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan, misalnya catat ke log
    //         Log::error('Error during paymentStore: ' . $e->getMessage());

    //         // Kembalikan respons dengan pesan kesalahan
    //         return redirect()->back()->with([
    //             'message' => 'Terjadi kesalahan. Pesanan tidak berhasil dikirim.',
    //             'alert-type' => 'error',
    //         ]);
    //     }
    // }


}
