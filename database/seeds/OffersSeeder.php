<?php

use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Offers::create([
           'type'=> 'bbbdjd',
            'city'=> 'sssss',
            'phone'=> '1111111',
            'email'=> 'www@gmail.com',
            'name'=> 'NJKSJNS',
            'company_name'=> 'nbc',
            'cost_from'=> '5554',
            'cost_to'=> '8898',
            'files'=> '544512.png',
            'message'=> 'dddd',
        ]);
    }
}
