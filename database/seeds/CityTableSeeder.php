<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new \App\Model\City();
        $city->district_id = 1;
        $city->name = 'Kathmandu';
        $city->type = 'Metropolitan City';
        $city->save();

        $city = new \App\Model\City();
        $city->district_id = 2;
        $city->name = 'Pokhara';
        $city->type = 'Metropolitan City';
        $city->save();
    }
}
