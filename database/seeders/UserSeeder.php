<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'      => "Admin",
                'email'     => 'admin@ekanusantara.com',
                'password'  => Hash::make('321321321'),
            ],
            [
                'name'      => "Conny Bamby",
                'email'     => 'conny.bamby@ekanusantara.com',
                'password'  => Hash::make('eka12345'),
            ],
            [
                'name'      => "Petrik Kristofel Menuk",
                'email'     => 'petrik@ekanusantara.com',
                'password'  => Hash::make('eka12345'),
            ],
            [
                'name'      => "Ari Lantang",
                'email'     => 'ari.lantang@ekanusantara.com',
                'password'  => Hash::make('eka12345'),
            ],
            [
                'name'      => "Fatma",
                'email'     => 'fatma@ekanusantara.com',
                'password'  => Hash::make('eka12345'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
