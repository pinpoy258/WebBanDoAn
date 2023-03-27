<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanphamHuongVi extends Model
{
    use HasFactory;

    protected $table = 'sanpham_huongvis';

    protected $fillable = [
        'sanpham_id',
        'huongvi_id',
        'soluong'
    ];

    public function huongvi()
    {
        return $this->belongsTo(HuongVi::class,'huongvi_id','id');
    }
}
