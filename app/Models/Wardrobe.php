<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wardrobe extends Model
{
use HasFactory;

    protected $fillable = [
        'type_wardrobe',
        'deskripsi',
        'harga_wardrobe',
    ];

    protected $table = 'wardrobe';
}
