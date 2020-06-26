<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Model\Admin();
        $admin->user_id = 1;
        $admin->name = 'Hotel Shankharapur';
        $admin->address = 'Shankharapur, Kathmandu, Nepal';
        $admin->tel1 = '+977-1-XXXXXX1';
        $admin->tel2 = '+977-1-XXXXXX2';
        $admin->mobile1 = '+977-XXXXXXXXX1';
        $admin->mobile2 = '+977-XXXXXXXXX2';
        $admin->email1 = 'info@hotelshankharapur.com';
        $admin->company_head = 'Roshan Kumar Shrestha';
        $admin->head_position = 'Managing Director';
        $admin->save();
    }
}
