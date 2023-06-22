<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assurances = [
            ['libelle' => 'VITALIS'],
            ['libelle' => 'NSIA'],
            ['libelle' => 'COMAR'],
            ['libelle' => 'ATLANTIQUE'],
            ['libelle' => 'AXA'],
        ];

        DB::table('assurances')->insert($assurances);
    }
}
