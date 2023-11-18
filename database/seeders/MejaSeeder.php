<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = array(
            [
                'cover' => 'meja1.jpg',
                'meja' => '1',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja2.jpg',
                'meja' => '2',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja3.jpg',
                'meja' => '3',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja4.jpg',
                'meja' => '4',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja5.jpg',
                'meja' => '5',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja6.jpg',
                'meja' => '6',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja1.jpg',
                'meja' => '7',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja2.jpg',
                'meja' => '8',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja3.jpg',
                'meja' => '9',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja4.jpg',
                'meja' => '10',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja5.jpg',
                'meja' => '11',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja6.jpg',
                'meja' => '12',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja1.jpg',
                'meja' => '13',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja2.jpg',
                'meja' => '14',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja3.jpg',
                'meja' => '15',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja4.jpg',
                'meja' => '16',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja5.jpg',
                'meja' => '17',
                'description' => 'Meja untuk muatan 6 orang',
            ],
            [
                'cover' => 'meja6.jpg',
                'meja' => '18',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja1.jpg',
                'meja' => '19',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja2.jpg',
                'meja' => '20',
                'description' => 'Meja untuk muatan 4 orang',
            ],
            [
                'cover' => 'meja3.jpg',
                'meja' => '21',
                'description' => 'Meja untuk muatan 4 orang',
            ],
        );
        foreach ($data as $d) {
            Meja::create([
                'cover' => $d['cover'],
                'meja' => $d['meja'],
                'description' => $d['description'],
            ]);
        }
    }
}
