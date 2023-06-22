<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['libelle' => 'consuler'],
            ['libelle' => 'modifier'],
            ['libelle' => 'supprimer'],
            ['libelle' => 'ajouter'],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
