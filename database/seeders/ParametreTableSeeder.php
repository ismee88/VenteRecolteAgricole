<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parametres')->insert([
            'titre'=>'Bienvenue sur le site FarmGood',
            'meta_description'=>'Bienvenue sur le site FarmGood',
            'meta_keywords'=>'Bienvenue sur le site FarmGood, Site web de commerce électronique',
            'logo'=>'frontend/img/core-img/logo.png',
            'favicon'=>'',
            'adresse'=>'Dieuppeul, Dakar, Sénégal',
            'email'=>'info@farmgoods.com',
            'telephone'=>'00221 78 110 76 46',
            'fax'=>'00221 33 864 06 71',
            'footer'=>'Ismael And',
            'facebook_url'=>'',
            'twitter_url'=>'',
            'linkedin_url'=>'',
            'pinterest_url'=>'',
        ]);
    }
}
