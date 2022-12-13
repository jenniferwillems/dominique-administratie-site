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
//            roll play books
            [
                'name' => 'World Of Darkness',
                'category_id' => 1
            ],
            [
                'name' => 'Vampire The Masquerade',
                'category_id' => 1
            ],
            [
                'name' => 'Call Of Cthulhu',
                'category_id' => 1
            ],
            [
                'name' => 'Hunter The Reckoning',
                'category_id' => 1
            ],
            [
                'name' => 'Dark Ages',
                'category_id' => 1
            ],
            [
                'name' => 'Changeling The Dreaming',
                'category_id' => 1
            ],
            [
                'name' => 'Wraith The Oblivion',
                'category_id' => 1
            ],
//            consoles
            [
                'name' => 'PC',
                'category_id' => 2
            ],
            [
                'name' => 'Nintendo Switch',
                'category_id' => 2
            ],
            [
                'name'=> 'Nintendo Wii U',
                'category_id'=> 2
            ],
            [
                'name' => 'Nintendo Wii',
                'category_id'=> 2
            ],
            [
                'name'=> 'Nintendo Gamecube',
                'category_id'=> 2
            ],
            [
                'name'=> 'Nintendo Entertainment System',
                'category_id'=> 2
            ],

            [
                'name' => 'PlayStation 4',
                'category_id' => 2
            ],
            [
                'name' => 'PlayStation 3',
                'category_id' => 2
            ],
            [
                'name' => 'PlayStation 2',
                'category_id' => 2
            ],
            [
                'name' => 'PlayStation 1',
                'category_id' => 2
            ],
            [
                'name' => 'Xbox Series X',
                'category_id' => 2
            ],
            [
                'name' => 'Xbox One',
                'category_id' => 2
            ],
            [
                'name' => 'Xbox 360',
                'category_id' => 2
            ],
            [
                'name' => 'Xbox',
                'category_id' => 2
            ],
            [
                'name' => 'Sega Mega drive',
                'category_id' => 2
            ],
            [
                'name' => 'Sega Genesis',
                'category_id' => 2
            ],
//            Movies
            [
                'name' => 'Action',
                'category_id' => 3
            ],
            [
                'name' => 'Adventure',
                'category_id' => 3
            ],
            [
                'name' => 'Fantasy',
                'category_id' => 3
            ],
            [
                'name' => 'Romance',
                'category_id' => 3
            ],
            [
                'name' => 'Horror',
                'category_id' => 3
            ],
            [
                'name' => 'Anime',
                'category_id' => 3
            ],
            [
                'name' => 'Manga',
                'category_id' => 3
            ],
            [
                'name' => 'Art house',
                'category_id' => 3
            ],
            [
                'name' => 'Comedy',
                'category_id' => 3
            ],
            [
                'name' => 'Drama',
                'category_id' => 3
            ],
            [
                'name' => 'Detective',
                'category_id' => 3
            ],
            [
                'name' => 'Crime',
                'category_id' => 3
            ],
            [
                'name' => 'History',
                'category_id' => 3
            ],
            [
                'name' => 'Documentary',
                'category_id' => 3
            ],
            [
                'name' => 'Thriller',
                'category_id' => 3
            ],
            [
                'name' => 'Science Fiction',
                'category_id' => 3
            ],
            [
                'name' => 'Western',
                'category_id' => 3
            ],
            [
                'name' => 'Music',
                'category_id' => 3
            ],
            [
                'name' => 'Gore',
                'category_id' => 3
            ],
            [
                'name' => 'Psychological',
                'category_id' => 3
            ],
            [
                'name' => '18+',
                'category_id' => 3
            ],
            [
                'name' => 'Superhero',
                'category_id' => 3
            ],

        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
