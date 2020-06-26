<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new \App\Model\State();
        $state->country_id = 1;
        $state->name = 'Bagmati';
        $state->save();

        $state = new \App\Model\State();
        $state->country_id = 1;
        $state->name = 'Gandaki';
        $state->save();

    }
}
