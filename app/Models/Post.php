<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'author_id',
        'category',
        'title',
        'seo_title',
        'excerpt',
        'body',
        'image',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'created_at'
    ];

    protected $dates = [
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        return $this->attributes['cteated_at'] = Carbon::parse($value)->locale('ru')->isoFormat("Do MMM YYYY HH:mm");
    }

    public function getSlugAttribute($value)
    {
        return "/post/" . $value;
    }

    public function getImageAttribute($value)
    {
        return "/storage/" . $value;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
