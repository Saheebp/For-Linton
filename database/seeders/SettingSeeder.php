<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
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
        //
        Setting::create([
            'address' => 'Farin Gada Jos',
            'phone1' => '00000000000',
            'phone2' => '00000000000',
            'email' => 'jsag@gmail.com',
            'web_url' => 'www.josstrawberriesandgrains.com',
            'facebook_url' => 'www.facebook.com/jsag',
            'instagram_url' => 'www.instagram.com/jsag',
            'twitter_url' => 'www.twitter.com/jsag',
            'youtube_url' => 'www.youtube.com/jsag',
        ]);
    }
}
