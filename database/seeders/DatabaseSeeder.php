<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\laporan;
use App\Models\detail_laporan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        User::create([
            'nip' => 'i472',
            'name' => 'umar',
            'email' => 'marinska@gmail.com',
            'password' => bcrypt('asdkana')
        ]);

        User::create([
            'nip' => 'g725',
            'name' => 'rita',
            'email' => 'rita@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'nip' => 'i474',
            'name' => 'luky',
            'email' => 'lukylukman45@gmail.com',
            'password' => bcrypt('lukylukman45')
        ]);


        laporan::create([
            'id' => 'LID2022-06-06',
            'user_id' => '1'
        ]);

        laporan::create([
            'id' => 'LID2022-06-07',
            'user_id' => '2'
        ]);

        detail_laporan::create([
            'laporan_id' => 'LID2022-06-06',
            'nopo' => '3000120111',
            'OBC' => 'KDS230111',
            'SERI' => '3',
            'Personalisasi' => 'P',
            'GR' => '3000'
        ]);

        detail_laporan::create([
            'laporan_id' => 'LID2022-06-06',
            'nopo' => '3000120112',
            'OBC' => 'KDS210112',
            'SERI' => '1',
            'Personalisasi' => 'P',
            'GR' => '3000'
        ]);

        detail_laporan::create([
            'laporan_id' => 'LID2022-06-07',
            'nopo' => '3000120222',
            'OBC' => 'KDS230222',
            'SERI' => '2',
            'Personalisasi' => 'P',
            'GR' => '4000'
        ]);

        detail_laporan::create([
            'laporan_id' => 'LID2022-06-07',
            'nopo' => '3000120223',
            'OBC' => 'KDS230223',
            'SERI' => '3',
            'Personalisasi' => 'P',
            'GR' => '5500'
        ]);
    }
}
