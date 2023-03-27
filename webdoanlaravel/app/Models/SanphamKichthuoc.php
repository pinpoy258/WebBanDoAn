<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanphamKichthuoc extends Model
{
    use HasFactory;

    protected $table = 'sanpham_kichthuocs';

    protected $fillable = [
        'sanpham_id',
        'kichthuoc_id',
        'soluong'
    ];

    public function kichthuoc()
    {
        return $this->belongsTo(Kichthuoc::class,'kichthuoc_id','id');
    }
}
