<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    use HasFactory;

    protected $table = 'nhacungcaps';

    protected $fillable = [
        'tennhacungcap',
        'slug',
        'trangthai',
        'loaisp_id'
    ];

    public function loaisp()
    {
        return $this->belongsTo(Loaisp::class, 'loaisp_id', 'id');
    }
}
