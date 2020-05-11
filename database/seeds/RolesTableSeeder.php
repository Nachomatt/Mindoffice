<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectPermissions = Permission::where('name', 'like', '%projects%')->get();

        Role::create(['name' => 'admin'])->syncPermissions(Permission::all());

        Role::create(['name' => 'project leader'])->syncPermissions($projectPermissions);

        Role::create(['name' => 'user'])->syncPermissions();

        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '1',
        ]);
    }
}
