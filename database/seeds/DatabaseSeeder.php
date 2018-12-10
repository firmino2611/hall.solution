<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        
        $this->call(EmpresasSeeder::class);
        $this->call(FornecedoresSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
