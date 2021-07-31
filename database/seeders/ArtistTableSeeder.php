<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = [
            [
                'created_at' => new \DateTime,
                'updated_at' => null,
                'name' => 'Salman Khan',
                'bio' => 'Abdul Rashid Salim Salman Khan 27 December 1965) is an Indian actor, film producer, singer, painter and television personality who works in Hindi films.',
                'photo' => 'salman-khan.jpg',
            ],
            [
                'created_at' => new \DateTime,
                'updated_at' => null,
                'name' => 'Sarukh Khan',
                'bio' => 'Sarukh Khan 27 December 1965) is an Indian actor, film producer, singer, painter and television personality who works in Hindi films.',
                'photo' => 'sarukh-khan.jpeg',
            ],
        ];

        \DB::table('artists')->insert($artists);
    }
}
