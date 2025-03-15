<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'villages';

    public function districts()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function users () 
    {
        return $this->hasMany(User::class, 'villages_id');
    }
}
