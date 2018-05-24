<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $settings = [
            /* App settings */
            ['key' => 'name', 'value' => 'Aurarich PH'],
            ['key' => 'about', 'value' => 'Aura Rich originated from Thailand. 
            They offer variety of whitening products from body lotions, face and body soaps, facial creams and sun screens. 
            Most of their products are from one natural ingredient which is honey.'],
            ['key' => 'deals', 'value' => 'Lorem Ipsum.'],
            ['key' => 'distributors', 'value' => 'To place a purchase for single product, select an AuraRich Distributor in your area. For larger orders, Be an AuraRich Distributor [link to Sell AuraRich page] and order product directly from AuraRich at discount rates!'],
            ['key' => 'address', 'value' => 'Philippines'],
            ['key' => 'email', 'value' => 'aurarichphilippines@gmail.com'],
            ['key' => 'phone_number_1', 'value' => '(+63) 905-1142985'],
            ['key' => 'phone_number_2', 'value' => '(+63) 921-8628680'],
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/aurarichphilippines'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/AuraRichPH'],
            ['key' => 'instagram_url', 'value' => 'https://www.instagram.com/aurarichphilippines/'],
            ['key' => 'youtube_url', 'value' => 'https://www.youtube.com/channel/UCWMcz3rn7HK9e0NX6Tx_qrA'],
        ];

        foreach ($settings as $index => $setting) {
            DB::table('settings')->insert([
                'key' => $setting['key'],
                'value' => $setting['value']
            ]);
        }
    }
}
