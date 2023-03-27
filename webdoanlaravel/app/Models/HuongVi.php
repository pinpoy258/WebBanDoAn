<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HuongVi extends Model
{
    use HasFactory;

    protected $table = 'huongvis';

    protected $fillable = [
        'tenhuongvi',
        'code',
        'trangthai'
        
    ];
}
