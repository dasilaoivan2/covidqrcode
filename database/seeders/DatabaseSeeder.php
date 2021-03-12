<?php

namespace Database\Seeders;

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
        $this->call([
            BarangaySeeder::class,
            CategorySeeder::class,
            IdcardSeeder::class,
            ProvinceSeeder::class,
            MunicipalitySeeder::class,
            RegionSeeder::class,
            CivilstatusSeeder::class,
            EmploymentstatusSeeder::class,
            ProfessionSeeder::class,
            CovidclassSeeder::class,
            UserSeeder::class
        ]);
    }
}
