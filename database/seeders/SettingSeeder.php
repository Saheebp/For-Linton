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

        Config::create([
            'name' => 'Referral Status',
            'category' => 'referral',
            'tag' => 'refstatus',
            'value' => 'false'
        ]);

        Config::create([
            'name' => 'Time Before Cancellation',
            'category' => 'order',
            'tag' => 'tbcancel',
            'value' => '15'
        ]);

        Config::create([
            'name' => 'Allow Wallet Payment',
            'category' => 'payment',
            'tag' => 'walletpay',
            'value' => 'true'
        ]);

        $categories = [
            [
                'name' => 'Equipment',
                'description' => 'Site equipment'
            ],
            [
                'name' => 'Disposables',
                'description' => 'Site disposables'
            ]
        ];

        foreach ($categories as $item) {
            # code...
            Category::create([
                'name' => $item['name'],
                'description' => $item['description']
            ]);
        }
    }
}
