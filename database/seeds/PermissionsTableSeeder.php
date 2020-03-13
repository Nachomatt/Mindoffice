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
                    'permission_type_id' => '1'
                ],

                [
                    'name' => 'see roles',
                    'permission_type_id' => '2'
                ],

                [
                    'name' => 'create roles',
                    'permission_type_id' => '2'
                ],

                [
                    'name' => 'edit roles',
                    'permission_type_id' => '2'
                ],

                [
                    'name' => 'delete roles',
                    'permission_type_id' => '2'
                ],

                [
                    'name' => 'see permissions',
                    'permission_type_id' => '3'
                ],

                [
                    'name' => 'create permissions',
                    'permission_type_id' => '3'
                ],

                [
                    'name' => 'edit permissions',
                    'permission_type_id' => '3'
                ],

                [
                    'name' => 'delete permissions',
                    'permission_type_id' => '3'
                ],

                [
                    'name' => 'see users',
                    'permission_type_id' => '4'
                ],

                [
                    'name' => 'create users',
                    'permission_type_id' => '4'
                ],

                [
                    'name' => 'delete users',
                    'permission_type_id' => '4'
                ],

                [
                    'name' => 'see projects',
                    'permission_type_id' => '5'
                ],

                [
                    'name' => 'create projects',
                    'permission_type_id' => '5'
                ],

                [
                    'name' => 'edit projects',
                    'permission_type_id' => '5'
                ],

                [
                    'name' => 'delete projects',
                    'permission_type_id' => '5'
                ],

                [
                    'name' => 'manage projects',
                    'permission_type_id' => '5'
                ],

                [
                    'name' => 'manage project members',
                    'permission_type_id' => '6'
                ]]


        );

    }
}
