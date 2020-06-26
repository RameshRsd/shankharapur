<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new \App\Model\Country();
        $country->name = 'Nepal';
        $country->save();

        $country = new \App\Model\Country();
        $country->name = 'India';
        $country->save();
    }
}
