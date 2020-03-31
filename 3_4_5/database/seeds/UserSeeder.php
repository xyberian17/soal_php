<?php

use App\User;
use Illuminate\Database\Seeder;
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
        User::insert(
            [
                'email' => 'admin@indocyber.co.id',
                'password' => Hash::make('Password123!'),
                'nohp' => '082124273565',
                'alamat' => 'Jl. Kumbang Raya No. 121 RT.10/RW.01
                            \nKel. Pegadungan, Kec. Kalideres,
                            \nJakarta Barat 11830',
                'remember_token' => '',
            ]
        );
    }
}
