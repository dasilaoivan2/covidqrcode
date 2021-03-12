<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Widow / Widower'],
            ['name' => 'Separated / Annulled'],
            ['name' => 'Living with Partner']
        ];

        foreach ($statuses as $status) {
            DB::table('civilstatuses')->insert([
                'name' => $status['name']
            ]);
        }
    }
}
