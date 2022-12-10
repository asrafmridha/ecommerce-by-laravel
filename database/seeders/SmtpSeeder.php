<?php

namespace Database\Seeders;

use App\Models\Smtp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smtp::create([

            'mailer'   => '',
            'host'     => '',
            'port'     => '',
            'user_name'=> '',
            'password' => '',
        ]);
    }
}
