<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('Quality Employee')){
            return  redirect(url('/qa/dashboard'));
        }elseif (auth()->user()->hasRole('QC')){
            return  redirect(url('/qc/dashboard'));
        }elseif (auth()->user()->hasRole('Store Employee')){
            return  redirect(url('/store/dashboard'));
        }elseif (auth()->user()->hasRole('Assistant Manager')){
            return  redirect(url('/assistantmanager/'));
        }elseif (auth()->user()->hasRole('Purchase Employee')){
            return  redirect(url('/purchase'));
        }elseif (auth()->user()->hasRole('HR')){
            return  redirect(url('/admin/hr'));
        }elseif (auth()->user()->hasRole('Production Employee')){
            return  redirect(url('/production/dashboard'));
        }elseif (auth()->user()->hasRole('Gate Employee')){
            return  redirect(url('/gate/dashboard'));
        }

//        return  redirect(url('/dashboard'));





        $user = DB::table('users')->count();
        $store = DB::table('store')->count();


        return view('dashboard', compact('user', 'store'));
    }

    public function store(){

        $store_info = DB::table('store')->get();
//        dd($store_info);

        return view('store.store', compact('store_info'));
    }

    public function gate(){
        $store_info = DB::table('store')->get();
        $inward_gate_pass = DB::table('inward_gate_pass')->count();



        return view('gate.gate', compact('store_info', 'inward_gate_pass'));
    }

    public function singleData($id){
        $store_info = DB::table('store')->get();

        $store = DB::table('store')->find($id);

        $details = DB::table('store_stock')->where('store_location', $store->name)->get();

        return view('store.storeDetails', compact('store', 'details', 'store_info'));
    }

    public function requisition(){

        $material_requisition = DB::table('production_material')->count();
        $component_requisition = DB::table('production_component')->count();



        return view('requisition.requisition', compact('material_requisition', 'component_requisition'));
    }

    public function sale(){


        return view('sale');

    }

    public function production(){


        return view('production');

    }

}
