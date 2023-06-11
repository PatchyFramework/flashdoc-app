<?php

namespace Database\Seeders;

use App\Models\Faskes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bsh = Faskes::create([
            'nama_faskes' => 'RS Bogor Senior Hospital',
            'phone_hotline' => '08197888017',
            'alamat_faskes' => 'Jl. Raya Tajur No.168, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137',
        ]);
        $photoPath = 'storage/photos/faskes/bsh.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/bsh.jpg')));

        $bsh->img_faskes = $photoPath;
        $bsh->save();


        $rsudkb = Faskes::create([
            'nama_faskes' => 'RSUD Kota Bogor',
            'phone_hotline' => '(0251) 8312292',
            'alamat_faskes' => 'Jl. DR. Sumeru No.120, RT.03/RW.20, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16112',
        ]);
        $photoPath = 'storage/photos/faskes/rsudkb.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/rsudkb.jpg')));

        $rsudkb->img_faskes = $photoPath;
        $rsudkb->save();



        $hermina = Faskes::create([
            'nama_faskes' => 'RS Hermina Bogor',
            'phone_hotline' => '(0251) 8382525',
            'alamat_faskes' => 'Jl. Ring Road I Kav Perumahan, Jl. Ring Road Taman Yasmin No.23, 25, 27, RT.08/RW.08, Curugmekar, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113',
        ]);
        $photoPath = 'storage/photos/faskes/hermina.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/hermina.jpg')));

        $hermina->img_faskes = $photoPath;
        $hermina->save();



        $azra = Faskes::create([
            'nama_faskes' => 'Rumah Sakit Azra Bogor',
            'phone_hotline' => '(0251) 8318456',
            'alamat_faskes' => ' Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153',
        ]);
        $photoPath = 'storage/photos/faskes/azra.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/azra.jpg')));

        $azra->img_faskes = $photoPath;
        $azra->save();



        $bmc = Faskes::create([
            'nama_faskes' => 'BMC MAYAPADA HOSPITAL',
            'phone_hotline' => '150770',
            'alamat_faskes' => 'Jl. Pajajaran Indah V No.97, RT.01/RW.11, Baranangsiang, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16143',
        ]);
        $photoPath = 'storage/photos/faskes/bmc.jpeg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/bmc.jpeg')));

        $bmc->img_faskes = $photoPath;
        $bmc->save();




        $juliana = Faskes::create([
            'nama_faskes' => 'RS Juliana',
            'phone_hotline' => '(0251) 8339593',
            'alamat_faskes' => 'Jl. Raya Tajur No.75, Tajur, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16134',
        ]);
        $photoPath = 'storage/photos/faskes/juliana.jpeg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/juliana.jpeg')));

        $juliana->img_faskes = $photoPath;
        $juliana->save();



        $melania = Faskes::create([
            'nama_faskes' => 'RS MELANIA',
            'phone_hotline' => '(0251) 8321196',
            'alamat_faskes' => 'Jl. Pahlawan No. 91, Bogor, Jawa Barat 16131',
        ]);
        $photoPath = 'storage/photos/faskes/melania.jfif';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/melania.jfif')));

        $melania->img_faskes = $photoPath;
        $melania->save();



        $pmi = Faskes::create([
            'nama_faskes' => 'RS PMI BOGOR',
            'phone_hotline' => '0251 832 4080',
            'alamat_faskes' => 'Jl. Rumah Sakit I, RT.01/RW.08, Tegallega, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129',
        ]);
        $photoPath = 'storage/photos/faskes/pmi.jpg';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/pmi.jpg')));

        $pmi->img_faskes = $photoPath;
        $pmi->save();



        $ummi = Faskes::create([
            'nama_faskes' => 'RS UMMI',
            'phone_hotline' => '(0251) 8341600',
            'alamat_faskes' => 'Jl. Empang II No.2, Empang, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16132',
        ]);
        $photoPath = 'storage/photos/faskes/ummi.jfif';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/ummi.jfif')));

        $ummi->img_faskes = $photoPath;
        $ummi->save();



        $vania = Faskes::create([
            'nama_faskes' => 'RS Vania Bogor',
            'phone_hotline' => '(0251) 8380601',
            'alamat_faskes' => 'Jl. Siliwangi No.11, RT.01/RW.03, Sukasari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16142',
        ]);
        $photoPath = 'storage/photos/faskes/vania.jfif';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/faskes/vania.jfif')));

        $vania->img_faskes = $photoPath;
        $vania->save();
    }
}
