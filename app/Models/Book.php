<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function series()
    {
        return $this->hasOne(Tag::class, 'id', 'series_id');
    }
}
