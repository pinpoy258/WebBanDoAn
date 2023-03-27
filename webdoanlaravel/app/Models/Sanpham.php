<?php

namespace App\Models;

use App\Models\SanphamHuongVi;
use App\Models\SanphamKichthuoc;
use App\Models\SanphamHinhanh;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanphams';

    protected $fillable = [
        'loaisp_id',
        'tensanpham',
        'slug',
        'nhacungcap',
        'small_mota',
        'mota',
        'original_gia',
        'selling_gia',
        'soluong',
        'banchay',
        'noibat',
        'trangthai',
        'meta_tieude',
        'meta_keyword',
        'meta_mota',
    ];

    public function loaisp()
    {
        return $this->belongsTo(Loaisp::class, 'loaisp_id','id');
    }
    
    public function sanphamHinhanhs()
    {
        return $this->hasMany(SanphamHinhanh::class,'sanpham_id', 'id');
    }

    public function sanphamHuongVis()
    {
        return $this->hasMany(SanphamHuongVi::class, 'sanpham_id','id');
    }

    public function sanphamKichthuocs()
    {
        return $this->hasMany(SanphamKichthuoc::class, 'sanpham_id','id');
    }
}
