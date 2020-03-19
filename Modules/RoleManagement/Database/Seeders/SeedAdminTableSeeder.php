<?php

namespace Modules\RoleManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeedAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('users')->insert([
            'name'=>'Shoaib Arshad',
            'email'=>'shoaibarshad@gmail.com',
            'password'=>Hash::make('12345678'),
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('model_has_roles')->insert([
            'role_id'=>1,
            'model_type'=>'App\User',
            'model_id'=>1
        ]);


        // $this->call("OthersTableSeeder");
    }
}
