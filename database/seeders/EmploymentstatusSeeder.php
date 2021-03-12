<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Government Employed'],
            ['name' => 'Private Employed'],
            ['name' => 'Self Employed'],
            ['name' => 'Private Practitioner'],
            ['name' => 'Others']
        ];

        foreach ($statuses as $status) {
            DB::table('employmentstatuses')->insert([
                'name' => $status['name']
            ]);
        }
    }
}
