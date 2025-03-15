<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = ['article_id', 'username', 'comment'];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }

}
