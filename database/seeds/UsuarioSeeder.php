<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Usuario::create([
    		'email' => 'lucasarafael654@gmail.com', 
    		'password' => Illuminate\Support\Facades\Hash::make('SomeRandomPass')
    	]);
    }
}
