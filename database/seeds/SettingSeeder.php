<?php

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
        $data = [
            'languages' => ['ar'],
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'site_name' => 'Challenge Coding',
            'address' => 'Test',
            'sm_description' => 'Test',
            'phone_1' => '8484858845855',
            'phone_2' => '939058050544',
            'email_1' => 'info@test.test',
            'email_2' => 'support@test.test',
            'logo' => 'uploads/setting/2021092573048489271.png',
            'logo_white' => 'uploads/setting/2021092573013376914.png',
            'favicon' => 'uploads/setting/2021092573048633155.png',
            'location' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'pinterest' => null,
            'snapchat' => null,
            'youtube' => null,
            'app_store' => null,
            'play_store' => null,
            'access_key' => 'Upd(?(rGk#ZMb2vb.Nd"+*?VgF^<Vn-3:}!kUz`!GcYjJhh~!F]{8c&JZ*[',
            'copyright' => 'All Rights Reserved. powered by',
            'copyright_link_text' => 'Hozaifa Ramadan',
            'copyright_link' => 'https://www.linkedin.com/in/hozaifa-ramadan/',
        ];
        Setting::setMany($data);
    }
}
