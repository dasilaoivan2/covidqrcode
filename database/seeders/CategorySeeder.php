<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Health Care Worker'],
            ['name' => 'Senior Citizen'],
            ['name' => 'Indigent'],
            ['name' => 'Uniformed Personnel'],
            ['name' => 'Essential Worker'],
            ['name' => 'Other'],
        ];

        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name']
            ]);
        }
    }
}
