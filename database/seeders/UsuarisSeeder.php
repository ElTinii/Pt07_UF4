<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Treiem les claus foranes per a que no ens doni problemes
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        //Esborrem els usuaris
        DB::table('users')->truncate();
        //Les activem
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        //Insertem els usuaris
        DB::table('users')->insert([
            'username' => 'alex',
            'email' => 'thos.vazquez.alex@gmail.com',
            'password' => bcrypt('12341234_A'),
            'data_naixement' => '2003-11-14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
