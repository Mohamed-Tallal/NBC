<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
           'name' => 'Mohamed Tallal',
           'email' => 'mohamed@gmail.com',
           'password' => bcrypt(123456789),
            'image' => '132.png'
        ]);
    }
}
