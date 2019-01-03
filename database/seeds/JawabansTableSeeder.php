<?php

use Illuminate\Database\Seeder;

class JawabansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Jawaban::create([
            'id_soal'	=> '1',
            'jawaban'	=> 'CTRL+Z',
        ]);

        \App\Jawaban::create([
            'id_soal'	=> '1',
            'jawaban'	=> 'CTRL+C',
        ]);

        \App\Jawaban::create([
            'id_soal'	=> '1',
            'jawaban'	=> 'CTRL+V',
        ]);

        \App\Jawaban::create([
            'id_soal'	=> '1',
            'jawaban'	=> 'CTRL+B',
        ]);
    }
}
