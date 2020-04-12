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

    public function orderDetails(){
//        dd('ssa');

        return view('order');
    }

    public function store(){

        $store_info = DB::table('store')->get();
//        dd($store_info);

        return view('store.store', compact('store_info'));
    }

    public function gate(){
        $component=[];
        $report_data=[];

        $status_check=DB::table('production_material_detail')->where('gate_type','outward')->where('status',5)->pluck('production_material_id');
        foreach ($status_check as $status){
            $report_data[]=DB::table('production_material')->where('id',$status)->first();
        }
        $status_check_component=DB::table('production_component_detail')->where('gate_type','outward')->where('status',5)->pluck('production_component_id');
//                    dd($status_check_component);
        foreach ($status_check_component as $status_component){
            $component[]=DB::table('production_component')->where('id',$status_component)->first();

        }
        $delivery_report=DB::table('sale_order')->where('status',3)->get();
//                    dd($delivery_report);



//        return view('gate::report/outward_report',compact('report_data','component','delivery_report'));


        $count=sizeof($report_data)+sizeof($component)+sizeof($delivery_report);


        $store_info = DB::table('store')->get();
        $inward_gate_pass = DB::table('inward_gate_pass')->count();
//        $outward=DB::table('sale_order')->where('status',3)->count();
//        dd($outward);
        return view('gate.gate', compact('store_info', 'inward_gate_pass','count'));
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

    public function employeeDepartment(){
        //dd("123");
         
        $query="Select count(*) AS total, d.name, d.id from departments d, employees e where e.department_id=d.id group by d.name,d.id";
        $employees =DB::select($query);

        return view('hr.employeeDepartment', compact('employees'));
    }

    public function sale(){


        return view('sale');

    }
    public function saletwo(){


        return view('saleTwo');

    }

    public function production(){


        return view('production');

    }

}
