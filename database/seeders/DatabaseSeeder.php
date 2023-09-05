<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //admin create
        \App\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'mobile' => '9895253510',
            'password' => Hash::make('13131313')
        ]);

          //seller create
          \App\Models\Seller::create([
            'name' => 'Seller',
            'email' => 'seller@test.com',
            'mobile' => '9895253510',
            'password' => Hash::make('13131313')
        ]);

        //language create
        \App\Models\Language::create([
            'Language' => 'English',
            'lang_code' => 'en',
            'lang_dir' => 'ltr'
        ],[
            'Language' => 'Malayalam',
            'lang_code' => 'ml',
            'lang_dir' => 'ltr'
        ]);


        \App\Models\Store::create([
            'store_name' => 'Kunjol Fashion',
            'store_adress' => 'Mattool Church Road',
            'store_latitude' => '11.971321',
            'store_longitude'=>'75.286463'
        ]);


    }
}
