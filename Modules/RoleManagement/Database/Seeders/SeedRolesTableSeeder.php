<?php

namespace Modules\RoleManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('roles')->insert([
            'name'=>'GM',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('roles')->insert([
            'name'=>'Admin',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('roles')->insert([
            'name'=>'Assistant Manager',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('roles')->insert([
            'name'=>'Officers',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()

        ]);

        DB::table('roles')->insert([
            'name'=>'Manager',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()

        ]);


        DB::table('roles')->insert([
            'name'=>'writer',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()

        ]);
        DB::table('roles')->insert([
            'name'=>'Accountant',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()

        ]);
        DB::table('roles')->insert([
            'name'=>'HR',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('roles')->insert([
            'name'=>'Inspection Manager',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('roles')->insert([
            'name'=>'Inspection Manager',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('roles')->insert([
            'name'=>'Technical Officer',
            'guard_name'=>'web',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        // $this->call("OthersTableSeeder");
    }
}
