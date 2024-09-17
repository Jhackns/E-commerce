<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        //Dashboard
        Permission::create([
            'name'=>'Ver dashboard'
        ]);
        //Categoria
        Permission::create([
            'name'=>'Listar Categoria'
        ]);
        Permission::create([
            'name'=>'Crear Categoria'
        ]);
        Permission::create([
            'name'=>'Editar Categoria'
        ]);
        Permission::create([
            'name'=>'Eliminar Categoria'
        ]);
        //Productos
        Permission::create([
            'name'=>'Listar productos'
        ]);
        Permission::create([
            'name'=>'Crear productos'
        ]);
        Permission::create([
            'name'=>'Editar productos'
        ]);
        Permission::create([
            'name'=>'Eliminar productos'
        ]);
    }

}
