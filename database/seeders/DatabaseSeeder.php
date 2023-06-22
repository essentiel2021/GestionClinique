<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Medecin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AssuranceSeeder::class);
        $this->call(CliniqueSeeder::class);
        // \App\Models\User::factory(10)->create();
        Medecin::factory(5)->create();
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
    }
}
