<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin::create([
        //     'nama' => 'Admin Sekolah',
        //     'email' => 'admin@gmail.com',
        //     'username' => 'adminsekolah',
        //     'alamat' => 'SMP Muhammadiyah 1 Pontianak',
        //     'no_hp' => '085752357098',
        //     'password' => bcrypt('12345678'),
        //     'role' => 'admin',
        // ]);

        // Admin::create([
        //     'nama' => 'Operator Sekolah',
        //     'email' => 'operator@gmail.com',
        //     'username' => 'operatorsekolah',
        //     'alamat' => 'SMP Muhammadiyah 1 Pontianak',
        //     'no_hp' => '085752357066',
        //     'password' => bcrypt('87654321'),
        //     'role' => 'operator',
        // ]);

        $users = [
                [
                    'nama' => 'Admin Sekolah',
                    'email' => 'admin@gmail.com',
                    'username' => 'adminsekolah',
                    'alamat' => 'SMP Muhammadiyah 1 Pontianak',
                    'no_hp' => '085752357098',
                    'password' => bcrypt('12345678'),
                    'role' => 'admin',
                ],
                [
                    'nama' => 'Operator Sekolah',
                    'email' => 'operator@gmail.com',
                    'username' => 'operatorsekolah',
                    'alamat' => 'SMP Muhammadiyah 1 Pontianak',
                    'no_hp' => '085752357066',
                    'password' => bcrypt('87654321'),
                    'role' => 'operator',
                ], 
        ];

        // foreach($users as $user)
        // {
        //     User::create($user);
        // }

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
