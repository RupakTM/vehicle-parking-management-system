<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name'=> 'Company Name',
            'address'=> 'Company Address',
            'phone' => 'Company Phone',
            'price_per_hour' => 0,
            'created_by' => 1
        ]);
    }
}
