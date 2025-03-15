<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'image_url', 'image_thumbnail', 'link', 'position', 'is_active'
    ];

}
