<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'category_id'];
    
    public function category()
    {
        return $this->hasOne(TagCategory::class, 'id', 'category_id');
    }
    
    public function books()
    {
        return $this->hasMany(Book::class, 'series_id');
    }
    
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
    
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    
    public function scopeSeriesTags($query, $format = false)
    {
        $tags = Tag::where('category_id', '=', 1)->get();
        if ($format) {
            return $this->formatTags($tags);
        }
        return $tags;
    }

    public function scopeConsolesTags($query, $format = false)
    {
        $tags = Tag::where('category_id', '=', 2)->get();
        if ($format) {
            return $this->formatTags($tags);
        }
        return $tags;
    }

    public function scopeGenresTags($query, $format = false)
    {
        $tags = Tag::where('category_id', '=', 3)->get();
        if ($format) {
            return $this->formatTags($tags);
        }
        return $tags;
    }
    
    public function formatTags($tags)
    {
        return $tags->map(function ($tag) {
            return ['id' => $tag->id, 'text' => $tag->name];
        })->toArray();
    }
}
