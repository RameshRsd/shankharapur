<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = new \App\Model\District();
        $district->state_id = 1;
        $district->name = 'Kathmandu';
        $district->save();

        $district = new \App\Model\District();
        $district->state_id = 2;
        $district->name = 'Kaski';
        $district->save();

    }
}
