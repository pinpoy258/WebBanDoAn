<?php

namespace App\Models;

use App\Models\Sanpham;
use App\Models\SanphamHuongVi;
use App\Models\SanphamKichthuoc;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'sanpham_id',
        'sanpham_huongvi_id',
        'sanpham_kichthuoc_id',
        'soluong',
        'gia'
    ];

    /**
     * Get the sanpham that owns the Orderitem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }

    /**
     * Get the sanpham that owns the Orderitem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanphamHuongVi(): BelongsTo
    {
        return $this->belongsTo(SanphamHuongVi::class, 'sanpham_huongvi_id', 'id');
    }

    /**
     * Get the sanpham that owns the Orderitem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanphamKichthuoc(): BelongsTo
    {
        return $this->belongsTo(SanphamKichthuoc::class, 'sanpham_kichthuoc_id', 'id');
    }
}
