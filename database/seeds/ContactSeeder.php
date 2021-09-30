<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =0 ;$i<=10;$i++){
        \App\Models\ContactUs::create([
        'name'     => ' Mohamed Tallal'.$i,
        'phone'    => '0112725255'.$i,
        'email'    => 'mohamed@gmail.com'.$i,
        'message'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quas fuga quod laudantium illum incidunt sit iusto quibusdam neque sapiente voluptate consectetur laboriosam, tempora non minus quis voluptates molestias dolore.'
        ]);
        }
    }
}
