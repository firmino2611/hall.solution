<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Empresa::class, 10)->create()->each(function ($empresa){
            $empresa->usuarios()
                        ->save(factory(\App\Usuario::class)
                            ->make(['empresa_id' => $empresa->id]));
            foreach ($empresa->usuarios as $usuario){
                \App\Funcionario::create([
                    'usuario_id' => $usuario->id
                ]);
            }
        });
    }
}
