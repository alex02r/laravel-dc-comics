<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $list_artist = '';
            foreach ($comic['artists'] as $artist) {
                $list_artist .= $artist;
            }
            $list_writers = '';
            foreach ($comic['writers'] as $writer) {
                $list_writers .= $writer;
            }

           $new_comic = new Comic;
           $new_comic->title = $comic['title'];
           $new_comic->description = $comic['description'];
           $new_comic->thumb = $comic['thumb'];
           $new_comic->price = $comic['price'];
           $new_comic->series = $comic['series'];
           $new_comic->sale_date = $comic['sale_date'];
           $new_comic->type = $comic['type'];
           $new_comic->artists = $list_artist;
           $new_comic->writers = $list_writers;
           $new_comic->save();
        }
    }
}
