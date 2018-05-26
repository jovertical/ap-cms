<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'demo',
            'id' => '1',
            'description' => 'Lorem ipsum dolor sit amet.'
        ]);
    }
}
