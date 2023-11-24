<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Site Name',
                'layout' => 'LTR',
                'contact_email' => 'dev@gmail.com',
                'currency' => 'IDR',
                'currency_icon' => 'Rp',
                'timezone' => 'Asia/Jakarta'
            ]
        );
    }
}
