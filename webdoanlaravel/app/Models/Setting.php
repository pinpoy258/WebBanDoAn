<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_url',
        'title',
        'meta_keywords',
        'meta_mota',
        'diachi',
        'doan1',
        'doan2',
        'email1',
        'email2',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
    ];
}
