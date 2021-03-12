<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idcards = [
            ['name' => 'PRC'],
            ['name' => 'OSCA'],
            ['name' => 'Facility ID'],
            ['name' => 'Other ID']
        ];

        foreach ($idcards as $id){
            DB::table('idcards')->insert([
                'name' => $id['name']
            ]);
        }
    }
}
