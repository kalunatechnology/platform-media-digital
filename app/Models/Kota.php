<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'regencies';
    
    public function provinces()
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function districts()
    {
        return $this->hasMany(Kecamatan::class);
    }
    public function users () 
    {
        return $this->hasMany(User::class, 'regencies_id');
    }
}
