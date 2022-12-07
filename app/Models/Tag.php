<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
    
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    
    public function scopeSeries()
    {
        return Tag::where('category_id', '=', 1)->get();
    }

    public function scopeConsoles()
    {
        return Tag::where('category_id', '=', 2)->get();
    }

    public function scopeGenres()
    {
        return Tag::where('category_id', '=', 3)->get();
    }
}
