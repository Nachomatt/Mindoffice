<?php

use App\PermissionType;
use Illuminate\Database\Seeder;

class PermissionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionType::insert([
                [
                    'name' => 'Administration'
                ],

                [
                    'name' => 'Roles'
                ],

                [
                    'name' => 'Permissions'
                ],

                [
                    'name' => 'Users'
                ],

                [
                    'name' => 'Projects'
                ],

                [
                    'name' => 'Project Members'
                ],

                [
                    'name' => 'Other permissions'
                ]]


        );
    }
}
