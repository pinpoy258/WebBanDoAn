<?php

namespace App\Models;

use App\Models\Sanpham;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisp extends Model
{
    use HasFactory;

    protected $table = 'loaisps';

    protected $fillable = [ 
        'tenloai',
        'slug',
        'mota',
        'hinhanh',
        'meta_tieude',
        'meta_keyword', 
        'meta_mota',
        'trangthai',     
    ];

    public function sanphams()
    {
        return $this->hasMany(Sanpham::class, 'loaisp_id','id');
    }

    public function nhacungcaps()
    {
        return $this->hasMany(Nhacungcap::class, 'loaisp_id','id')->where('trangthai','0');
    }


}
