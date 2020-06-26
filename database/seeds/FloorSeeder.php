<?php

use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floor = new \App\Model\Floor();
        $floor->name = 'Ground Floor';
        $floor->slug = 'ground-floor';
        $floor->type = 'lock';
        $floor->save();
    }
}
