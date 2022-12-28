<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Config;
use App\Models\Category;
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
            'name' => 'POAADIT',
            'address' => 'Lagos, Nigeria',
            'phone1' => '00000000000',
            'phone2' => '00000000000',
            'email' => 'help@poaadit.com',
            'web_url' => 'www.poaadit.com',
            'facebook_url' => 'www.facebook.com/poaadit',
            'instagram_url' => 'www.instagram.com/poaadit',
            'twitter_url' => 'www.twitter.com/poaadit',
            'youtube_url' => 'www.youtube.com/poaadit',
        ]);

        // Config::create([
        //     'name' => 'Referral Status',
        //     'category' => 'referral',
        //     'tag' => 'refstatus',
        //     'value' => 'false'
        // ]);

        // Config::create([
        //     'name' => 'Time Before Cancellation',
        //     'category' => 'order',
        //     'tag' => 'tbcancel',
        //     'value' => '15'
        // ]);

        // Config::create([
        //     'name' => 'Allow Wallet Payment',
        //     'category' => 'payment',
        //     'tag' => 'walletpay',
        //     'value' => 'true'
        // ]);
    }
}
