<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fornecedor::class, 10)->create([
            'empresa_id' => function(){
                $size = count(Empresa::all());
                return Empresa::all()[rand(0, $size-1)]->id;
            }
        ]);
    }
}
