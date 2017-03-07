<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradores')->insert([
        	'rut'				=>	'16.769.124-2',
        	'nombre'			=>	'Luis Guillermo',
        	'apellido_paterno'	=>	'Mercado',
        	'apellido_materno'	=>	'Castelli',
        	'email'				=>	'memofunster@gmail.com',
        	'password'			=>	bcrypt('luxizo'),
        ]);
    }
}

