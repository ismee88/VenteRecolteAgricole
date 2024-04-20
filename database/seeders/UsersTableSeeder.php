<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Client
            [
                'nom_complet'=>'Bob Client',
                'username'=>'Client88',
                'email'=>'client@gmail.com',
                'email_verified_at' => now(),
                'telephone'=>'781107646',
                'adresse'=>'Dakar Dieuppeul Rue DD-116',
                'password'=>Hash::make('client'),
                'statut'=>'active',
            ],
        ]);

        //admin
        DB::table('admins')->insert([
            [
                'nom_complet'=>'Ismee Admin',
                'username'=>'admin88',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin'),
                'statut'=>'active',
            ],
        ]);

        //vendeur
        DB::table('vendeurs')->insert([
            [
                'nom_complet'=>'Ismee Vendeur',
                'username'=>'vendeur88',
                'photo'=>'',
                'email'=>'vendeur@gmail.com',
                'password'=>Hash::make('vendeur'),
                'adresse'=>'Dakar Dieuppeul',
                'telephone'=>'767750028',
                'statut'=>'active',
            ],
        ]);
    }
}
