<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CovidclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            ['name' => 'Asymptomatic'],
            ['name' => 'Mild'],
            ['name' => 'Moderate'],
            ['name' => 'Severe'],
            ['name' => 'Critical']
        ];

        foreach ($classes as $class) {
            DB::table('covidclasses')->insert([
                'name' => $class['name']
            ]);
        }
    }
}
