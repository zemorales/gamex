<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('permissions')->delete();                   
       

        DB::table('permissions')->insert([
            'name' => 'ver_roles',
            'guard_name' => 'api',            
        ]);
        DB::table('permissions')->insert([
            'name' => 'crear_roles',
            'guard_name' => 'api',            
        ]);

        DB::table('permissions')->insert([
            'name' => 'editar_roles',
            'guard_name' => 'api',            
        ]);
        DB::table('permissions')->insert([
            'name' => 'eliminar_roles',
            'guard_name' => 'api',            
        ]);
        DB::table('permissions')->insert([
            //'id'=>2,
            'name' => 'ver_permisos',
            'guard_name' => 'api',            
        ]);
        DB::table('permissions')->insert([
            //'id'=>2,
            'name' => 'crear_permisos',
            'guard_name' => 'api',            
        ]);

        DB::table('permissions')->insert([
            //'id'=>3,
            'name' => 'editar_permisos',
            'guard_name' => 'api',            
        ]);
        DB::table('permissions')->insert([
            //'id'=>3,
            'name' => 'eliminar_permisos',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
           // 'id'=>4,
            'name' => 'asignar_rol',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            //'id'=>5,
            'name' => 'ver_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            //'id'=>6,
            'name' => 'crear_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
            //'id'=>7,
            'name' => 'editar_usuarios',
            'guard_name' => 'api',            
        ]);

        
        DB::table('permissions')->insert([
           // 'id'=>8,
            'name' => 'eliminar_usuarios',
            'guard_name' => 'api',            
        ]);

        
        
       

        $role = Role::create(['name' => 'SuperAdmin2']);
       
        $role->givePermissionTo(Permission::all());
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@correo.com',
            'password' => Hash::make('admin')
        ]);
        $user->roles()->attach($role);
       
       
    }
}
