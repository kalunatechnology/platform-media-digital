<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';

    protected $fillable = [
        'title', 'slug', 'short_description', 'content',
        'thumbnail', 'user_id', 'category_id',
        'views_count', 'status', 'editor_pick', 'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'article_id');
    }

    public function views()
    {
        return $this->hasMany(ArticleViews::class, 'article_id');
    }

}
