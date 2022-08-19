<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'admin01',
            'nama' => 'Admin Rizky',
            'nomor_telepon' => '081211425363',
            'password' => Hash::make('Password12'),
            'role' => 'Admin'
        ]);

        $user->admin()->create([
            'nik' => '123123123123',
            'alamat' => 'Jalan Bintara, Bekasi Barat, Kota Bekasi',
            'jenis_kelamin' => 1
        ]);
    }
}
