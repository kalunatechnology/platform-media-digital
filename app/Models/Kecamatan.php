<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'districts';

    public function regencies()
    {
        return $this->belongsTo(Kota::class);
    }
    public function villages()
    {
        return $this->hasMany(Kelurahan::class);
    }
    public function users () 
    {
        return $this->hasMany(User::class, 'districts_id');
    }
}
