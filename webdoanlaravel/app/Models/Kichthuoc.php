<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kichthuoc extends Model
{
    use HasFactory;

    protected $table = 'kichthuocs';

    protected $fillable = [
        'tenkichthuoc',
        'makichthuoc',
        'trangthai'
        
    ];
}
