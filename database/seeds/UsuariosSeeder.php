<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = count(Empresa::all());
        $id = Empresa::all()[rand(0, $size-1)]->id;

        $usuario = \App\Usuario::create([
           'nome' => 'Hall Solution',
           'email' => 'admin@admin.com',
           'senha' => bcrypt('admin'),
            'empresa_id' => $id
        ]);
        $usuario->assignRole('admin');
    }
}
