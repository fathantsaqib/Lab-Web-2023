<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DriverStoreRequest;
use App\Http\Requests\Admin\DriverUpdateRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::latest()->get();

        return view ('admin.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverStoreRequest $request)
    {
        if ($request -> validated()) {
            $gambar_lisence= $request->file('gambar_lisence')->store('assets/driver', 'public');
            $slug = Str::slug($request->nama_mobil, '-');
            Driver::create($request->except('gambar_lisence') + ['gambar_lisence' =>$gambar_lisence, 'slug' => $slug]);
        }
        return redirect()->route('drivers.index')->with([
            'message' => 'data sukses dibuat',
            'alert-type' => 'success'
        ]);
        
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
    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage. 
     */
    public function update(DriverUpdateRequest $request, Driver $driver)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_driver, '-');
            $driver->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('drivers.index')->with([
            'message' => 'data berhasil diperbarui',
            "alert-type" => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        if($driver->gambar_lisence) {
            unlink('storage/'. $driver->gambar_lisence);
        }
        $driver->delete();

        return redirect()->back()->with([
            'message' => 'data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }

    public function updateImage(Request $request, $driverId) 
    {
        $request->validate([
            'gambar_lisence' => 'required|image'
        ]);
        $driver = Driver::findOrFail($driverId);
        if($request->gambar_lisence){
            unlink('storage/'. $driver->gambar_lisence);
            $gambar_lisence = $request->file('gambar_lisence')->store('assets/car', 'public');

            $driver->update(['gambar_lisence' => $gambar_lisence]);
        }

        return redirect()->back()->with([
            'message' => 'gambar berhasil diedit',
            "alert-type" => 'info'
        ]);

        // $request->validate([
        //     'gambar_lisence' => 'required|image'
        // ]);
        // $driver = Driver::findOrFail($driverId);
        // if($request->gambar_lisence){
        //     unlink('storage/'. $driver->gambar_lisence);
        //     $gambar_lisence = $request->file('gambar_lisence')->store('assets/car', 'public');

        //     $driver->update(['gambar_lisence' => $gambar_lisence]);
        // }

        // return redirect()->back()->with([
        //     'message' => 'gambar berhasil diedit',
        //     "alert-type" => 'info'
        // ]);
    }

    
}
