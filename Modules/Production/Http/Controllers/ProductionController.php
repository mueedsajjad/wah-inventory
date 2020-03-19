<?php

namespace Modules\Production\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ProductionController extends Controller
{
    public function dashboard()
    {
        $stores=DB::table('store')->get();

        $orders=DB::table('production_order')->get();
        return view('production::dashboard/dashboard',compact('orders','stores'));
    }

    public function newOrder()
    {
        return view('production::Order/newOrder');
    }

    public function orderStore(Request $request)
    {
       // dd('abc');

        $data= $request->validate(
            [
                'manufacturing_order' => 'required|string',
                'product' => 'required|string',
                'quantity' => 'required|integer',
                'total_cost' => 'required|integer',
                'production_deadline' => 'required|date',
                'create_date' => 'required|date',
            ]
        );

       //dd($data);
        DB::table('production_order')->insert([
            'manufacturing_order'=>$data['manufacturing_order'],
            'product'=>$data['product'],
            'quantity'=>$data['quantity'],
            'total_cost'=>$data['total_cost'],
            'production_deadline'=>$data['production_deadline'],
            'created_date'=>$data['create_date'],
            'status'=>0,
            'type'=>'Product'
        ]);

        return redirect()->back()->with('save','Saved Successfully');
    }

    public function processStatus(Request $request)
    {
             DB::table('production_order')->where('id',$request->id)
                 ->update(['status'=>$request->status]);
             return redirect()->back()->with('save','Changed Status Successfully');
    }

    public function transferProduct(Request $request)
    {
        $data= $request->validate(
            [
                'id' => 'required',
                'store_id' => 'required|integer',
            ]
        );

//        DB::table('transfer_request_store')
//            ->insert([
//                'store_id'=>$data['store_id'],
//                'order_id'=>$data['id']
//            ]);

        DB::table('production_order')
            ->where('id',$data['id'])
            ->update([
                'status'=>4
            ]);

        return redirect()->back()->with('save','Transfered To Store Successfully');
    }

    // --------------------------- Order Component ------------------------------ //
    public function orderComponent()
    {
        return view('production::Order/componetOrder');
    }

    public function orderComponentStore(Request $request)
    {
        $data= $request->validate(
            [
                'manufacturing_order' => 'required|string',
                'component_name' => 'required|string',
                'quantity' => 'required|integer',
                'total_cost' => 'required|integer',
                'production_deadline' => 'required|date',
                'create_date' => 'required|date',
            ]
        );

        //dd($data);
        DB::table('component_order')->insert([
            'manufacturing_order'=>$data['manufacturing_order'],
            'component_name'=>$data['component_name'],
            'quantity'=>$data['quantity'],
            'total_cost'=>$data['total_cost'],
            'production_deadline'=>$data['production_deadline'],
            'created_date'=>$data['create_date'],
            'status'=>0,
            'type'=>'Component'
        ]);

        return redirect()->back()->with('save','Saved Successfully');
    }

    Public function componentDashboard()
    {
        $stores=DB::table('store')->get();
        $orders=DB::table('component_order')->get();

        return view('production::dashboard/componentDashboard',compact('orders','stores'));
    }

    public function processStatusComponent(Request $request)
    {
        DB::table('component_order')->where('id',$request->id)
            ->update(['status'=>$request->status]);
        return redirect()->back()->with('save','Changed Status Successfully');
    }

    public function transferComponent(Request $request)
    {
        $data= $request->validate(
            [
                'id' => 'required',
                'store_id' => 'required|integer',
            ]
        );

//        DB::table('transfer_request_store')
//            ->insert([
//                'store_id'=>$data['store_id'],
//                'order_id'=>$data['id']
//            ]);


        DB::table('component_order')
            ->where('id',$data['id'])
            ->update([
                'status'=>4
            ]);

        return redirect()->back()->with('save','Transfered To Store Successfully');
    }

    // ------------------------------------ requisition To Store ------------------------------------- //
    public function materialRequisition()
    {
        $units=DB::table('unit')->get();
        $orders=DB::table('component_order')
            ->where('status',0)
            ->get();
        return view('production::requisition/material_requisition',compact('orders','units'));
    }

    public function materialRequisitionStore(Request $request)
    {
       // dd($request);

        $data=[
            'manufacturing_no' => $request->manufacturing_no,
            'issue_date' => $request->issue_date,
            'create_date' => Carbon::today(),
            'status' => 0
        ];

        $insertProductionMaterial=DB::table('production_material')->insert($data);

        $productionMaterial= DB::table('production_material')->orderBy('id', 'desc')->first();


        $productionMaterial_id=$productionMaterial->id;

        for($i=0 ; $i<$request->countMaterial ; $i++){
            $data=[
                'material_name' => $request['materialName'][$i],
                'UOM' => $request['uom'][$i],
                'quantity' => $request['qty'][$i],
                'description' => $request['description'][$i],
                'production_material_id' =>$productionMaterial_id,

            ];
            $insertProductionMaterialDetail=DB::table('production_material_detail')->insert($data);
        }

        if ($insertProductionMaterial && $insertProductionMaterialDetail){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }


    }

//    public function setting()
//    {
//
//        return view('production::setting/setting');
//    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        return view('production::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('production::create');
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
        return view('production::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('production::edit');
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
