<?php

use Illuminate\Database\Seeder;

class UsuarioPortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
        	[
        		'nombre' => 'Jhon Trejos',
        		'email' => 'jhontrl0.1@gmail.com',
        		'password' => Hash::make('123456789')
        	]
        ];

        foreach ($usuarios as $usuario) {
        	\App\UsuarioPortal::create($usuario);
        }
    }
}
