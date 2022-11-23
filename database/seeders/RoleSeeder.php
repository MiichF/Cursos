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

        Permission::create(['name' => 'admin.home','description' => 'Ver el menú de administración'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index','description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        //Permission::create(['name' => 'admin.users.update','description' => 'Editar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.index','description' => 'Ver listado de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias.create','description' => 'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.edit','description' => 'Editar categorias'])->syncRoles([$role1,]);
        Permission::create(['name' => 'admin.categorias.destroy','description' => 'Elminar categorias'])->syncRoles([$role1,]);

        Permission::create(['name' => 'admin.etiquetas.index','description' => 'Ver listado de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.etiquetas.create','description' => 'Crear etiquetas'])->syncRoles([$role1,]);
        Permission::create(['name' => 'admin.etiquetas.edit','description' => 'Editar etiquetas'])->syncRoles([$role1,]);
        Permission::create(['name' => 'admin.etiquetas.destroy','description' => 'Eliminar etiquetas'])->syncRoles([$role1,]);

        Permission::create(['name' => 'admin.cursos.index','description' => 'Ver listado de cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.create','description' => 'Crear cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.edit','description' => 'Editar cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.destroy','description' => 'Eliminar cursos'])->syncRoles([$role1, $role2]);
    }
}
