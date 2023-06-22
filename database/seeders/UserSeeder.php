<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => "Angui",
            'lastName' => "Jathniel",
            'email' =>'achijathniel@gmail.com',
            'password' => Hash::make('gracenebie@9419'),
        ]);
        DB::table('users')->insert([
            'name' => "test",
            'lastName' => "test",
            'email' =>'test@gmail.com',
            'password' => Hash::make('gracenebie@9419'),
        ]);
    }
}
