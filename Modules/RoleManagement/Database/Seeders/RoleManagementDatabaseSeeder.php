<?php

namespace Modules\RoleManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();
        $this->call(SeedRolesTableSeeder::class);
        $this->call(SeedPermissionsTableSeeder::class);
        $this->call(SeedAdminTableSeeder::class);
        // $this->call("OthersTableSeeder");
    }
}
