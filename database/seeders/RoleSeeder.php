<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.etiquetas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.etiquetas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.etiquetas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.etiquetas.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.cursos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.destroy'])->syncRoles([$role1, $role2]);
    }
}
