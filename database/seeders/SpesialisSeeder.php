<?php

namespace Database\Seeders;

use App\Models\Spesialis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spesialis::create([
            'spesialis' => 'Mata',
        ]);

        Spesialis::create([
            'spesialis' => 'Penyakit Dalam',
        ]);

        Spesialis::create([
            'spesialis' => 'Kulit',
        ]);

        Spesialis::create([
            'spesialis' => 'THT',
        ]);

        Spesialis::create([
            'spesialis' => 'Anak',
        ]);

        Spesialis::create([
            'spesialis' => 'Jantung dan Pembuluh Darah',
        ]);

        Spesialis::create([
            'spesialis' => 'Gigi',
        ]);

        Spesialis::create([
            'spesialis' => 'Bedah Plastik',
        ]);

        Spesialis::create([
            'spesialis' => 'Syaraf',
        ]);

        Spesialis::create([
            'spesialis' => 'Bedah',
        ]);
    }
}
