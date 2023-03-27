<?php

namespace App\Models;

use App\Models\Sanpham;
use App\Models\SanphamHuongVi;
use App\Models\SanphamKichthuoc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Giohang extends Model
{
    use HasFactory;

    protected $table = 'giohangs';

    protected $fillable = [
        'user_id',
        'sanpham_id',
        'sanpham_huongvi_id',
        'sanpham_kichthuoc_id',
        'soluong'
    ];
    /**
     * Get the user that owns the Giohang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }

    public function sanphamHuongVi(): BelongsTo
    {
        return $this->belongsTo(SanphamHuongVi::class, 'sanpham_huongvi_id', 'id');
    }

    public function sanphamKichthuoc(): BelongsTo
    {
        return $this->belongsTo(SanphamKichthuoc::class, 'sanpham_kichthuoc_id', 'id');
    }
}
