<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Harry Potter',
                'category_id' => 1
            ],
            [
                'name' => 'Star Wars',
                'category_id' => 1
            ],
            [
                'name' => 'Lord of the Rings',
                'category_id' => 1
            ],
            [
                'name' => 'PC',
                'category_id' => 2
            ],
            [
                'name' => 'Nintendo Switch',
                'category_id' => 2
            ],
            [
                'name' => 'PlayStation 4',
                'category_id' => 2
            ],
            [
                'name' => 'Xbox',
                'category_id' => 2
            ],
            [
                'name' => 'Actie',
                'category_id' => 3
            ],
            [
                'name' => 'Avontuur',
                'category_id' => 3
            ],
            [
                'name' => 'Fantasy',
                'category_id' => 3
            ],
        ];
        
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
