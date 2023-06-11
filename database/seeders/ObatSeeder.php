<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $antimo = Obat::create([
            'nama_obat' => 'Antimo Dimenhydrinate Tablet 1s 10 Pcs',
            'harga_obat' => 8000,
        ]);
        $photoPath = 'storage/photos/obat/antimo.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/antimo.jpg')));

        $antimo->img_obat = $photoPath;
        $antimo->save();



        $tolakangin = Obat::create([
            'nama_obat' => 'TOLAK ANGIN CAIR',
            'harga_obat' => 49335,
        ]);
        $photoPath = 'storage/photos/obat/tolakangin.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/tolakangin.jpg')));

        $tolakangin->img_obat = $photoPath;
        $tolakangin->save();

        

        $albendazole = Obat::create([
            'nama_obat' => 'Albendazol suspensi 200 mg/5 ml',
            'harga_obat' => 5198,
        ]);
        $photoPath = 'storage/photos/obat/albendazole.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/albendazole.jpg')));

        $albendazole->img_obat = $photoPath;
        $albendazole->save();



        $cdr = Obat::create([
            'nama_obat' => 'CDR EFFERVESCENT SINGLE ORANGE ISI 10',
            'harga_obat' => 64009,
        ]);
        $photoPath = 'storage/photos/obat/cdr.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/cdr.jpg')));

        $cdr->img_obat = $photoPath;
        $cdr->save();



        $benadryl = Obat::create([
            'nama_obat' => 'Benadryl Batuk Berdahak Sirup 50 Ml',
            'harga_obat' => 30279,
        ]);
        $photoPath = 'storage/photos/obat/benadryl.jpeg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/benadryl.jpeg')));

        $benadryl->img_obat = $photoPath;
        $benadryl->save();


        $bisolvon = Obat::create([
            'nama_obat' => 'Bisolvon 8 Mg 10 Tablet',
            'harga_obat' => 28320,
        ]);
        $photoPath = 'storage/photos/obat/bisolvon.jpeg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/bisolvon.jpeg')));

        $bisolvon->img_obat = $photoPath;
        $bisolvon->save();



        $bodrex = Obat::create([
            'nama_obat' => 'Bodrex Extra 4 Kaplet',
            'harga_obat' => 2420,
        ]);
        $photoPath = 'storage/photos/obat/bodrex.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/bodrex.jpg')));

        $bodrex->img_obat = $photoPath;
        $bodrex->save();




        $holisticare = Obat::create([
            'nama_obat' => 'Holisticare Ester C 1000 30 Tablet',
            'harga_obat' => 161975,
        ]);
        $photoPath = 'storage/photos/obat/holisticare.png';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/holisticare.png')));

        $holisticare->img_obat = $photoPath;
        $holisticare->save();




        $blackmores = Obat::create([
            'nama_obat' => 'Blackmores Kids Body Shield 60 Tablet',
            'harga_obat' => 260205,
        ]);
        $photoPath = 'storage/photos/obat/blackmores.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/blackmores.jpg')));

        $blackmores->img_obat = $photoPath;
        $blackmores->save();





        $sanmol = Obat::create([
            'nama_obat' => 'Sanmol 120 Mg Sirup 60 Ml',
            'harga_obat' => 21423,
        ]);
        $photoPath = 'storage/photos/obat/sanmol.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/obat/sanmol.jpg')));

        $sanmol->img_obat = $photoPath;
        $sanmol->save();
    }
}
