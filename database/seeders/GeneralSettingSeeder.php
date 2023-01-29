<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'currency'           => 'taka ৳',
            'email'              => 'admin@.com',
            'alter_email'        => 'support@admin.com',
            'phone'              => '01776716093',
            'alter_phone'        =>  '01679433941',
            'address'            => 'Bangladesh',
            'logo'               => 'logo.png',
            'favicon'            => 'favicon.png',
            'meta_title'         => 'Meta Title',
            'meta_description'   => 'Meta Description',
            'meta_keywords'      => 'Meta Keywords',
            'copyright_text'     =>  'Copyright Dgtaltech © 2023. All Rights Reserved.',
            'footer_description' => 'Footer Description',
            'location_image'     => 'location.png',
            'phone_image'        => '',
            'email_image'        => '',
            'company_name'       => 'Ecommerce',
        ]);
    }
}
