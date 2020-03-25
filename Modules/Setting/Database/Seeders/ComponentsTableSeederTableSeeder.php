<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ComponentsTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('production_component_store')->insert([
            'name'=>'Brass Head',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('production_component_store')->insert([
            'name'=>'Primer',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('production_component_store')->insert([
            'name'=>'Tube',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'Base Wad',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'OP Wad',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'Closing Disk',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'Lead Shots',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'Obtrature',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('production_component_store')->insert([
            'name'=>'Propellant',
            'type'=>'Component',
            'quantity'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
// ---------------------------------- Component In Setting ------------------ //
        DB::table('component')->insert([
            'component_name'=>'Brass Head',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('component')->insert([
            'component_name'=>'Primer',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        DB::table('component')->insert([
            'component_name'=>'Tube',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'Base Wad',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'OP Wad',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'Closing Disk',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'Lead Shots',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'Obtrature',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        DB::table('component')->insert([
            'component_name'=>'Propellant',
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);
        // $this->call("OthersTableSeeder");
    }
}
