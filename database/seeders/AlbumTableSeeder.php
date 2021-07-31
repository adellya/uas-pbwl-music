<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = [
            [
                'name' => 'Kabhi Khushi Kabhie Gham',
                'artist_id' => '1',
            ],
            [
                'name' => 'Kal Ho Naa Ho',
                'artist_id' => '2',
            ],
        ];

        \DB::table('albums')->insert($albums);
    }
}
