<?php

use Illuminate\Database\Seeder;
use \Kodeine\Acl\Models\Eloquent\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->create([
            'name' => 'Admim',
            'slug' => 'admin',
            'description' => ''
        ]);

        $role = new Role();
        $role->create([
            'name' => 'Funcionario',
            'slug' => 'funcionario',
            'description' => ''
        ]);

    }
}
