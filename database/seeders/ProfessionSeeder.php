<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = [
            ['name' => 'Government Employed'],
            ['name' => 'Private Employed'],
            ['name' => 'Self Employed'],
            ['name' => 'Private Practitioner'],
            ['name' => 'Others']
        ];

        foreach ($professions as $profession) {
            DB::table('professions')->insert([
                'name' => $profession['name']
            ]);
        }
    }
}
