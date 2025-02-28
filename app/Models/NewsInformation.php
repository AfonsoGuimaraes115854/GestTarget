<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class NewsInformation extends Model
{
    protected $fillable = ['name', 'description', 'image', 'slug'];

    protected $table = 'news_information';
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($news) {
            $news->slug = Str::slug($news->name);
        });
    }
}

