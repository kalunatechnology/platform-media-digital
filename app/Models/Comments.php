<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = ['article_id', 'username', 'comment', 'email'];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->diffForHumans();
    }

}
