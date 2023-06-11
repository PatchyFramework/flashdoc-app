<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $natasha = Dokter::create([
            'name' => 'Natasha',
            'phone' => '08818164990',
            'email' => 'dokter@dokter.com',
            'password' => bcrypt('natasha1234'),
            'spesialis_id' => 1,
            'faskes_id' => 1,
        ]);

        $natasha->assignRole('dokter');


        $luocha = Dokter::create([
            'name' => 'Luocha',
            'phone' => '08818164991',
            'email' => 'luocha@dokter.com',
            'password' => bcrypt('luocha1234'),
            'spesialis_id' => 2,
            'faskes_id' => 2,
        ]);

        $luocha->assignRole('dokter');

        $herta = Dokter::create([
            'name' => 'Herta',
            'phone' => '08818164992',
            'email' => 'herta@dokter.com',
            'password' => bcrypt('herta1234'),
            'spesialis_id' => 3,
            'faskes_id' => 3,
        ]);

        $herta->assignRole('dokter');


        $serval = Dokter::create([
            'name' => 'Serval',
            'phone' => '0881816499993',
            'email' => 'serval@dokter.com',
            'password' => bcrypt('serval1234'),
            'spesialis_id' => 4,
            'faskes_id' => 4,
        ]);

        $serval->assignRole('dokter');

        $bailu = Dokter::create([
            'name' => 'Bailu',
            'phone' => '08818164994',
            'email' => 'bailu@dokter.com',
            'password' => bcrypt('bailu1234'),
            'spesialis_id' => 5,
            'faskes_id' => 5,
        ]);

        $bailu->assignRole('dokter');


        $vira = Dokter::create([
            'name' => 'Vira',
            'phone' => '0881816499995',
            'email' => 'vira@dokter.com',
            'password' => bcrypt('vira1234'),
            'spesialis_id' => 6,
            'faskes_id' => 6,
        ]);

        $vira->assignRole('dokter');

        $strange = Dokter::create([
            'name' => 'Strange',
            'phone' => '08818164996',
            'email' => 'strange@dokter.com',
            'password' => bcrypt('strange1234'),
            'spesialis_id' => 7,
            'faskes_id' => 7,
        ]);

        $strange->assignRole('dokter');


        $niki = Dokter::create([
            'name' => 'Niki',
            'phone' => '0881816499997',
            'email' => 'niki@dokter.com',
            'password' => bcrypt('niki1234'),
            'spesialis_id' => 8,
            'faskes_id' => 8,
        ]);

        $niki->assignRole('dokter');

        $jason = Dokter::create([
            'name' => 'Jason',
            'phone' => '08818164998',
            'email' => 'jason@dokter.com',
            'password' => bcrypt('jason1234'),
            'spesialis_id' => 9,
            'faskes_id' => 9,
        ]);

        $jason->assignRole('dokter');


        $haerin = Dokter::create([
            'name' => 'Haerin',
            'phone' => '0881816499999',
            'email' => 'haerin@dokter.com',
            'password' => bcrypt('haerin1234'),
            'spesialis_id' => 10,
            'faskes_id' => 10,
        ]);

        $haerin->assignRole('dokter');
    }
}
