<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagCategory extends Model
{
    use HasFactory;

    public function scopeAllCategories($query, $format = false)
    {
        $categories = TagCategory::all();
        if ($format) {
            return $this->formatCategories($categories);
        }
        return $categories;
    }
    
    public function formatCategories($categories)
    {
        return $categories->map(function ($category) {
            return ['id' => $category->id, 'text' => $category->name];
        })->toArray();
    }
}
