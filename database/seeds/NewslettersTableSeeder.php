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
            'trigger' => 'subscribed',
            'frequency' => null,
            'title' => 'Welcome to '.config('app.name'),
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Voluptatem fugit rem repellat eligendi odio obcaecati earum ex 
                delectus explicabo temporibus! Exercitationem, reiciendis quaerat?
                Quod nulla molestiae necessitatibus facere voluptas amet!'
        ]);
    }
}
