<?php

use Illuminate\Database\Seeder;

class SoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Soal::create([
            'id_kategori_soal'	=> '1',
            'jenis_jawaban'	=> 'Teks',
            'soal'	=> 'Perintah salin file ?',
            'gambar'	=> '-',
            'id_jawaban'	=> '0',
            'bobot'	=> '10',
        ]);

        \App\Soal::create([
            'id_kategori_soal'	=> '1',
            'jenis_jawaban'	=> 'Teks',
            'soal'	=> 'Siapa pencipta Linux ?',
            'gambar'	=> '-',
            'id_jawaban'	=> '0',
            'bobot'	=> '10',
        ]);

        \App\Soal::create([
            'id_kategori_soal'	=> '1',
            'jenis_jawaban'	=> 'Teks',
            'soal'	=> 'Windows versi terakhir ?',
            'gambar'	=> '-',
            'id_jawaban'	=> '0',
            'bobot'	=> '10',
        ]);

        \App\Soal::create([
            'id_kategori_soal'	=> '1',
            'jenis_jawaban'	=> 'Teks',
            'soal'	=> 'Media penyimpanan dalam bentuk piringan ?',
            'gambar'	=> '-',
            'id_jawaban'	=> '0',
            'bobot'	=> '10',
        ]);

        \App\Soal::create([
            'id_kategori_soal'	=> '1',
            'jenis_jawaban'	=> 'Teks',
            'soal'	=> 'Hard Disk adalah ?',
            'gambar'	=> '-',
            'id_jawaban'	=> '0',
            'bobot'	=> '10',
        ]);
    }
}
