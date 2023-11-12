<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    #pembuatatan data awal dalam tabel
    use HasFactory;
    
    # agar datannya aman mknya menggunakan protected
    protected $table = 'products';

}
