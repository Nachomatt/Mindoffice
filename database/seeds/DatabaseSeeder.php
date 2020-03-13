<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTypesTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);
    }
}
