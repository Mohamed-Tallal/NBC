<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ;$i<= 100;$i++){
            \App\Models\Product::create([
                'name' => 'Saaha'.$i,
                'img' => '132.png'
            ]);
        }
    }
}
