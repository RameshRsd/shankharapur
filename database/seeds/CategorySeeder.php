<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Model\Category();
        $category->name = 'Slider';
        $category->type = 'lock';
        $category->save();
    }
}
