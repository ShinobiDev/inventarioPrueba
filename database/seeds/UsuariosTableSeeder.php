<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = "Usuario Vendedor";
        $user->email = "administrador@prueba.com";
        $user->password = bcrypt('123456');
        $user->rol_id = 1;
        $user->save();

        $user = new User;
        $user->name = "Usuario Cliente";
        $user->email = "cliente@prueba.com";
        $user->password = bcrypt('123456');
        $user->rol_id = 2;
        $user->save();
    }
}
