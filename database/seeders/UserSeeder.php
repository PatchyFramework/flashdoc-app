<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admintest',
            'phone' => '0000',
            'email' => 'admin@admin.com',
            'address' => 'jl.admin',
            'password' => bcrypt('admin1234'),
        ]);
        $admin->assignRole('admin');

        $photoPath = 'storage/photos/Haerin.jfif';
        Storage::put($photoPath, file_get_contents(public_path('storage/photos/Haerin.jfif')));

        $admin->profile_picture = $photoPath;
        $admin->save();



        $user = User::create([
            'name' => 'usertest',
            'phone' => '0001',
            'email' => 'user@user.com',
            'address' => 'jl.user',
            'password' => bcrypt('user1234'),
        ]);

        $user->assignRole('user');

    }
}
