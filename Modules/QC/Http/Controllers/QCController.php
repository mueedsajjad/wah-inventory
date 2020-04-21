<?php

namespace Modules\QC\Http\Controllers;
//namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class QCController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function dash()
    {
//        dd('faizu');
        $pending=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
        $done_2=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
        $done_3=DB::table('inward_raw_material')->where('status',3)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
        $done_4=DB::table('inward_raw_material')->where('status',4)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
        $done_5=DB::table('inward_raw_material')->where('status',5)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
        $done_6=DB::table('inward_raw_material')->where('status',6)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)  ->orderBy('id', 'desc')->get();
//        dd($done_6);
        $count_all=sizeof($pending)+sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        $count_app=sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        $count_pen=sizeof($pending);
//        dd($count);
        $approved=[];
        $app_pend=[];
        $all_gate=DB::table('inward_gate_pass')->select('gatePassId')->get();
        foreach($all_gate as $a)
        {
            $app_3=DB::table('inward_raw_material')->where('gatePassId',$a->gatePassId)->where('requisition_id','!=',Null)->where('inspectionDate','!=',NULL)->first();
            if ($app_3!=NULL)
                $app_pend[]=$app_3;

        }
        $count_app=sizeof($app_pend);
//        dd($app_pend);
        $count_all=sizeof($app_pend);
        $all=DB::table('inward_raw_material')->get();

        return view('qc::dashboard.details',compact('count_pen','count_app'));
    }

    public function love()
    {
        dd('faizan');
    }
    public function dashboard()
    {
        $arr_pend=[];
        $app_pend=[];
        $all_gate=DB::table('inward_gate_pass')->select('gatePassId')->get();
//        dd($all_gate);
        foreach($all_gate as $a)
        {
            $app_3=DB::table('inward_raw_material')->where('gatePassId',$a->gatePassId)->where('requisition_id','!=',Null)->where('inspectionDate','!=',NULL)->first();
            if ($app_3!=NULL)
                $app_pend[]=$app_3;

        }

//        dd($app_pend);
        $count_all=sizeof($app_pend);
        //        dd($done_6);
//        $count_all=sizeof($pending)+sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        return view('qc::dashboard.dashboard',compact('count_all'));
    }

    public function productionProduct(){

        $record = DB::table('production_order')->where('status', '>=',4)  ->orderBy('id', 'desc')->get();


//        dd($record);

        return view('qc::productionProduct', compact('record'));
    }

    public function productionComponent(){

        $record = DB::table('component_order')->where('status', '>=',4)  ->orderBy('id', 'desc')->get();

        return view('qc::productionComponent', compact('record'));
    }
    public function rejected(){


        return view('qc::dashboard.rejected');
    }
    public function list(){


        return view('qc::dashboard.list');
    }

    public function componentInspection(Request $request){

//        dd($request->all());
        DB::table('component_order')->where('id', $request->id)->update($request->except('_token', 'id'));

            return redirect()->back()->with('message', 'This i note genareted successfully and sent to Store');
    }

    public function productInspection(Request $request){
//dd($request->all());
        DB::table('production_order')->where('id', $request->id)->update($request->except('_token', 'id'));

        return redirect()->back()->with('message', 'This i note genareted successfully and sent to Store');

    }



    public function index()
    {
        return view('qc::index');
    }


    public function create()
    {
        return view('qc::create');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('qc::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('qc::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
