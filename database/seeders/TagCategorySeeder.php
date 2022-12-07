<?php

namespace Database\Seeders;

use App\Models\TagCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagCategories = [
            [
                'name' => 'Series'
            ],
            [
                'name' => 'Consoles'
            ],
            [
                'name' => 'Genres'
            ]
        ];
        
        foreach ($tagCategories as $tagCategory){
            TagCategory::create($tagCategory);
        }
    }
}
