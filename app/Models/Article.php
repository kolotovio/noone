<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;


class Article extends Model
{
    use HasFactory, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'likes',
        'views',
        'is_active',
    ];

    protected $with = ['comments'];

    public function getLead()
    {
        $firstHundred = mb_substr($this->body, 0, 100);
        return $firstHundred;
    }

    public function scopeGetFirstSix($query)
    {
        $query->whereIsActive(true)->orderBy('created_at', 'desc')->take(6);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $appends = ['Tags'];

    public function getTagsAttribute()
    {
        return $this->tags()->get();
    }
}
