<?php

namespace Database\Seeders;

use App\Models\SeoTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoTable::create([
            'meta_title'  => '',
            'meta_author' => '',
            'meta_tag'    => '',
            'meta_description' =>'',
            'meta_keyword'=> '',
            'google_verification'=> '',
            'google_analytics'=> '',
            'alexa_verification'=> '',
            'google_adsens'=> '',

        ]);
    }
}
