<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanphamHinhanh extends Model
{
    use HasFactory;

    protected $table = 'sanpham_hinhanhs';

    protected $fillable = [
        'sanpham_id',
        'hinhanh'
    ];

}
