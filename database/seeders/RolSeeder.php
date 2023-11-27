<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $rol_admin = Role::create(['name' => 'admin']);
        $rol_jefe_turno = Role::create(['name' => 'jefeTurno']);
        $rol_vendedor = Role::create(['name' => 'vendedor']);
        $rol_cajero = Role::create(['name' => 'cajero']);
        $rol_repositor = Role::create(['name' => 'repositor']);

        // Permisos para cada rol
        Permission::create(['name' => 'lista_cotizaciones'])->syncRoles($rol_admin, $rol_jefe_turno);
        Permission::create(['name' => 'lista_proveedores'])->syncRoles($rol_admin, $rol_jefe_turno);
        Permission::create(['name' => 'lista_empleados'])->syncRoles($rol_admin, $rol_jefe_turno);
        Permission::create(['name' => 'lista_clientes'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_cajero]);
        Permission::create(['name' => 'lista_categorias'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_repositor]);
        Permission::create(['name' => 'lista_productos'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_repositor]);
        Permission::create(['name' => 'lista_ventas'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_vendedor, $rol_cajero]);
        Permission::create(['name' => 'lista_cajas'])->syncRoles([$rol_admin,$rol_jefe_turno,  $rol_cajero]);
        Permission::create(['name' => 'lista_requerimientos'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_repositor]);
        Permission::create(['name' => 'lista_mails'])->syncRoles([$rol_admin,$rol_jefe_turno,  $rol_repositor]);
        Permission::create(['name' => 'lista_compras'])->syncRoles([$rol_admin, $rol_jefe_turno, $rol_cajero]);






    }
}
