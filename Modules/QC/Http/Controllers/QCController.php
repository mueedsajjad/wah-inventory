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
        $pending=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate',NULL)->get();
        $done_2=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)->get();
        $done_3=DB::table('inward_raw_material')->where('status',3)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)->get();
        $done_4=DB::table('inward_raw_material')->where('status',4)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)->get();
        $done_5=DB::table('inward_raw_material')->where('status',5)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)->get();
        $done_6=DB::table('inward_raw_material')->where('status',6)->where('inspectionDate','!=',NULL)->where('requisition_id','!=',Null)->get();
//        dd($done_6);
        $count_all=sizeof($pending)+sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        $count_app=sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        $count_pen=sizeof($pending);
//        dd($count);
        $approved=[];
        $all=DB::table('inward_raw_material')->get();
        foreach ($all as $a)
        {
//            if ()
        }

        return view('qc::dash',compact('count_pen','count_app'));
    }

    public function love()
    {
        dd('faizan');
    }
    public function dashboard()
    {
        $pending=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate',NULL)->get();
        $done_2=DB::table('inward_raw_material')->where('status',2)->where('inspectionDate','!=',NULL)->where('purchase_order_id','!=',Null)->get();
        $done_3=DB::table('inward_raw_material')->where('status',3)->where('inspectionDate','!=',NULL)->where('purchase_order_id','!=',Null)->get();
        $done_4=DB::table('inward_raw_material')->where('status',4)->where('inspectionDate','!=',NULL)->where('purchase_order_id','!=',Null)->get();
        $done_5=DB::table('inward_raw_material')->where('status',5)->where('inspectionDate','!=',NULL)->where('purchase_order_id','!=',Null)->get();
        $done_6=DB::table('inward_raw_material')->where('status',6)->where('inspectionDate','!=',NULL)->where('purchase_order_id','!=',Null)->get();
//        dd($done_6);
        $count_all=sizeof($pending)+sizeof($done_2)+sizeof($done_3)+sizeof($done_4)+sizeof($done_5)+sizeof($done_6);
        return view('qc::dashboard/dashboard',compact('count_all'));
    }

    public function index()
    {
        return view('qc::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('qc::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
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
