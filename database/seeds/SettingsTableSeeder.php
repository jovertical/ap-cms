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
            ['key' => 'about', 'value' => 'AuraRich products are an all-natural line of whitening & cosmetic products from Thailand. Since 2016, AuraRich has been the fastest growing cosmetic product line in Thailand. Owing its popularity to its proven ability to improve skin tone and appearance. The AuraRich product line provides a powerful combination of natural skin whitening & toning power. <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Our independent distributor program offers you the opportunity to be your own boss, build your own clients, acquire reward points for travel and annual bonuses, while making great money from your sales! 

             <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp We are currently recruiting TOP sales team members in preparation for our Philippine launch in Fall 2018. Sign up today to lock in your pre-order discounts and ensure your position at the top! All AuraRich products are FDA and ASEAN approved, and have not been tested on animals. We stand by our products and our top team members are also proud users of the product!</br>'],
            ['key' => 'deals', 'value' => 'Now that you have made a decision to become an AuraRich Reseller or Distributor, <br> You may now choose which deals suits you best. '],
            ['key' => 'distributors', 'value' => 'To place a purchase for single product, select an AuraRich Distributor in your area. For larger orders, Be an AuraRich Distributor [link to Sell AuraRich page] and order product directly from AuraRich at discount rates!'],
            ['key' => 'address', 'value' => '1007 Stall 2 Central St. Parada, Santa Maria, Bulacan'],
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
