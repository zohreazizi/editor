<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'soudeh',
                'email' => 'soudeh' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'mosadegheh',
                'email' => 'mosadegheh' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'elahe',
                'email' => 'elahe' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'nioosha',
                'email' => 'nioosha' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'zahra',
                'email' => 'zahra' . '@gmail.com',
                'password' => Hash::make('12345678'),
            ]

        ];


            User::query()->insert($users);


    }
}
