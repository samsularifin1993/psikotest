<?php

use Illuminate\Database\Seeder;

class KategoriSoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\KategoriSoal::create([
            'kategori'	=> 'Teknologi',
            'durasi'	=> '10',
        ]);
    }
}
