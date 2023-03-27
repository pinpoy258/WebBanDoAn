<?php

namespace App\Models;

use App\Models\Sanpham;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'user_id',
        'sanpham_id'
    ];

    /**
     * Get the user that owns the Wishlist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanpham(): BelongsTo
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
}
