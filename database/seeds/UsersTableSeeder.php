<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'jovert123',
            'email' => 'jovert@buildit.com',
            'password' => bcrypt('secret'),
            'verified' => 1,
            'type' => 'superuser',

            'first_name' => 'jovert',
            'middle_name' => 'lota',
            'last_name' => 'palonpon',
            'birthdate' => '1998-05-18',
            'gender' => 'male',
            'address' => 'marungko, angat, bulacan',
            'contact_number' => '09356876995'
        ]);

        \App\User::create([
            'name' => 'elaine123',
            'email' => 'groseelaine@gmail.com',
            'password' => bcrypt('secret'),
            'verified' => 1,
            'type' => 'superuser',

            'first_name' => 'rose elaine',
            'middle_name' => 'arellano',
            'last_name' => 'gumasing',
            'birthdate' => '1998-06-24',
            'gender' => 'female',
            'address' => 'pulong buhangin, santa maria, bulacan',
            'contact_number' => '09173314449'
        ]);
    }
}
