<?php

namespace Modules\Store\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('store')->insert([
            'name' => 'Magazine 1',
            'created_at' => Carbon::now()
        ]);

        DB::table('store')->insert([
           'name' => 'Magazine 2',
           'created_at' => Carbon::now()
        ]);

        DB::table('store')->insert([
            'name' => 'Finished Goods 1',
            'created_at' => Carbon::now()
        ]);

        DB::table('store')->insert([
            'name' => 'Finished Goods 2',
            'created_at' => Carbon::now()
        ]);

        DB::table('store')->insert([
            'name' => 'Components',
            'created_at' => Carbon::now()
        ]);

        DB::table('store')->insert([
            'name' => 'Tools',
            'created_at' => Carbon::now()
        ]);
    }
}
