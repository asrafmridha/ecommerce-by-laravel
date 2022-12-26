<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

            'currency'=>'',
            'phone_one'=>'',
            'phone_two'=>'',
            'main_email'=>'',
            'support_email'=>'',
            'logo'=>'',
            'favicon'=>'',
            'address'=>'',
            'facebook'=>'#',
            'twitter'=>'#',
            'instagram'=>'#',
            'linkedin'=>'#',
            'youtube' => '#',
        ]);
    }
}
