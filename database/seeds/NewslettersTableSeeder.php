<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Newsletter::create([
            'trigger' => 'registered',
            'frequency' => null,
            'title' => 'Welcome to '.config('app.name'),
            'body' => 'Aurarich is expanding into the Philippines! Visit our Sell AuraRich page for details on how to register as an Independent Distributor or Reseller. 
Sign up for our newsletter to stay up to date on launch date events and all other updates to the AuraRich launch.'
        ]);

        \App\Newsletter::create([
            'trigger' => 'subscribed',
            'frequency' => null,
            'title' => 'Welcome to '.config('app.name'),
            'body' => 'Thankyou for subscribing to our Newsletter, from now on you will receive the latest news and updates about AuraRich Philippines so stay tuned for more details!'
        ]);
        \App\Newsletter::create([
            'trigger' => 'scheduled',
            'frequency' => null,
            'title' => 'Welcome to '.config('app.name'),
            'body' => 'Today marks the Grand Launch of AuraRich in the Philippines! See you at the Mall of Asia!'
        ]);
    }
}
