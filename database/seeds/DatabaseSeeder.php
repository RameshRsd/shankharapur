<?php

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
         $this->call(UserSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(FloorSeeder::class);
         $this->call(AdminSeeder::class);
         $this->call(CountrySeeder::class);
         $this->call(StateTableSeeder::class);
         $this->call(DistrictSeeder::class);
         $this->call(CityTableSeeder::class);

    }
}
