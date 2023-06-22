<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CliniqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliniques = [
            ['libelle' => 'FARAH'],
            ['libelle' => 'INDENIE'],
            ['libelle' => 'PRIMA'],
            ['libelle' => 'PISAM'],
            ['libelle' => 'DANGA'],
        ];

        DB::table('cliniques')->insert($cliniques);
    }
}
