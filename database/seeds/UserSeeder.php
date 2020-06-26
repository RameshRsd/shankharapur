<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@hotelshankharapur.com';
        $user->password = bcrypt('admin@123');
        $user->type = 'admin';
        $user->status = 'active';
        $user->save();
    }
}
