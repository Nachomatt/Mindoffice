<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
                [
                    'name' => 'Moderate Website',
                    'permission_type_id' => '1',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'see roles',
                    'permission_type_id' => '2',
                    'guard_name' => 'web',

                ],

                [
                    'name' => 'create roles',
                    'permission_type_id' => '2',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'edit roles',
                    'permission_type_id' => '2',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'delete roles',
                    'permission_type_id' => '2',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'see permissions',
                    'permission_type_id' => '3',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'create permissions',
                    'permission_type_id' => '3',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'edit permissions',
                    'permission_type_id' => '3',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'delete permissions',
                    'permission_type_id' => '3',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'see users',
                    'permission_type_id' => '4',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'create users',
                    'permission_type_id' => '4',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'delete users',
                    'permission_type_id' => '4',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'see projects',
                    'permission_type_id' => '5',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'create projects',
                    'permission_type_id' => '5',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'edit projects',
                    'permission_type_id' => '5',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'delete projects',
                    'permission_type_id' => '5',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'manage projects',
                    'permission_type_id' => '5',
                    'guard_name' => 'web',
                ],

                [
                    'name' => 'manage project members',
                    'permission_type_id' => '6',
                    'guard_name' => 'web',
                ]]


        );

    }
}
