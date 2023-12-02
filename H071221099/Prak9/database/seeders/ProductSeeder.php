<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
            'Nama' => 'Sabun Mandi',
            'Harga' => '12000',
            'Stok' => '100',
            ]
        ]);
    }
}
