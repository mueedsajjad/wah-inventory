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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {

        $stores=DB::table('store')->get();
        $stocks=DB::table('production_component_store')->get();

        $orders=DB::table('production_order')
            ->orderBy('id', 'desc')
            ->get();
        return view('production::dashboard/dashboard',compact('orders','stores','stocks'));
    }

    public function allProductionDetail($id)
    {
        $stocks=DB::table('production_component_store')->get();
        $orders=DB::table('production_order')
            ->where('id',$id)
           ->get();

        return view('production::dashboard/all_production_detail', compact('orders','stocks'));
    }




    public function newOrder()
    {

        $newProduct=DB::table('production_order')->orderBy('id', 'desc')->first();

        if($newProduct)
        {
            $id=$newProduct->id;
            $id++;
        }
        else
        {
            $id=1;
        }

        return view('production::Order/newOrder',compact('id'));
    }

    public function orderStore(Request $request)
    {
//        $new=DB::table('production_order')
//            ->where('status',0)
//            ->orwhere('status',1)
//            ->orwhere('status',2)
//            ->count();
//
//        dd($new);
        $new=1;
        if($new>0)
        {
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
                'type'=>'Product',
                'stage_status'=>0
            ]);

            return redirect()->back()->with('save','Saved Successfully');
        }
        else
        {
            return redirect()->back()->with('exist','Production Order is already running');
        }



    }

    public function processStatus(Request $request)
    {
        if($request->status==3)
        {
            DB::table('production_order')->where('id',$request->id)
                ->update([
                    'stage_status'=>$request->status,
                    'status'=>$request->status
                ]);
            // ------------------------ Update ---------------------- //
            $Currentcomponent= DB::table('production_order')
                ->where('id',$request->id)
                ->first();

            $newQuantity=$Currentcomponent->quantity;

            $stockComponent=DB::table('production_component_store')
                ->where('name','Brass Head')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Brass Head')
                ->update(['quantity'=>$latest]);

            /// ---------------------------
            $stockComponent=DB::table('production_component_store')
                ->where('name','Primer')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Primer')
                ->update(['quantity'=>$latest]);

         /// --------------------------
            $stockComponent=DB::table('production_component_store')
                ->where('name','Tube')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Tube')
                ->update(['quantity'=>$latest]);


            // -----------------------------------
            $stockComponent=DB::table('production_component_store')
                ->where('name','Base Wad')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Base Wad')
                ->update(['quantity'=>$latest]);
           // -----------------------------

            $stockComponent=DB::table('production_component_store')
                ->where('name','OP Wad')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','OP Wad')
                ->update(['quantity'=>$latest]);

            // ----------------------------------


            $stockComponent=DB::table('production_component_store')
                ->where('name','Closing Disk')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Closing Disk')
                ->update(['quantity'=>$latest]);

            // ----------------------------------


            $stockComponent=DB::table('production_component_store')
                ->where('name','Lead Shots')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Lead Shots')
                ->update(['quantity'=>$latest]);

            // ----------------------------------


            $stockComponent=DB::table('production_component_store')
                ->where('name','Obtrature')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Obtrature')
                ->update(['quantity'=>$latest]);

            // ----------------------------------

            $stockComponent=DB::table('production_component_store')
                ->where('name','Propellant')
                ->first();

            $currentQuantity=$stockComponent->quantity;
            $latest= $currentQuantity- $newQuantity;

            DB::table('production_component_store')
                ->where('name','Propellant')
                ->update(['quantity'=>$latest]);

        }else{

            DB::table('production_order')->where('id',$request->id)
                ->update([
                    'stage_status'=>$request->status,
                    'status'=>$request->status
                ]);
        }

             return redirect()->back()->with('save','Changed Status Successfully');
    }

    public function allDoneProduct($id)
    {
        $stocks=DB::table('production_component_store')
            ->orderBy('id', 'desc')
            ->get();
        $orders=DB::table('production_order')
            ->where('id',$id)
            ->get();

        return view('production::dashboard/all_done_product',compact('orders','stocks'));
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
        $newProduct=DB::table('component_order')->orderBy('id', 'desc')->first();
        if($newProduct)
        {
            $id=$newProduct->id;
            $id++;
        }
        else
        {
            $id=1;
        }

        return view('production::Order/componetOrder',compact('id'));
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

        $material_requisition_id = 'MR-'.random_int(999,9999);
//        dd($material_requisition_id);
        $data=[
            'gate_type' => $request->gate_type,

            'material_requisition_id' => $material_requisition_id,
            'manufacturing_no' => $request->manufacturing_no,
            'issue_date' => $request->issue_date,
            'create_date' => Carbon::today(),

        ];

        $insertProductionMaterial=DB::table('production_material')->insert($data);

        $productionMaterial= DB::table('production_material')->orderBy('id', 'desc')->first();

        $productionMaterial_id=$productionMaterial->id;

        for($i=0 ; $i<$request->countMaterial ; $i++){
            $data=[
                'gate_type' => $request->gate_type,

                'material_requisition_id' => $productionMaterial->material_requisition_id,
                'material_name' => $request['materialName'][$i],
                'UOM' => $request['uom'][$i],
                'quantity' => $request['qty'][$i],
                'description' => $request['description'][$i],
                'production_material_id' =>$productionMaterial_id,
                'status' => 0
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

    public function componentRequisition()
    {
        $components=DB::table('component')->get();
        $orders=DB::table('production_order')
            ->where('status',0)
            ->orderBy('id', 'desc')
            ->get();

        return view('production::requisition/component_requisition',compact('orders'
        ,'components'));

    }


    public function componentRequisitionStore(Request $request)
    {

        $component_requisition_id = 'CR-'.random_int(999,9999);

        $data=[
            'gate_type' => $request->gate_type,
            'component_requisition_id' => $component_requisition_id,
            'manufacturing_no' => $request->manufacturing_no,
            'issue_date' => $request->issue_date,
            'create_date' => Carbon::today(),
        ];


        $insertProductionMaterial=DB::table('production_component')->insert($data);

        $productionMaterial= DB::table('production_component')->orderBy('id', 'desc')->first();


        $productionComponent_id=$productionMaterial->id;

        for($i=0 ; $i<$request->countMaterial ; $i++){

            $data=[
                'gate_type' => $request->gate_type,
                'component_requisition_id' => $component_requisition_id,
                'component_name' => $request['materialName'][$i],
                'quantity' => $request['qty'][$i],
                'description' => $request['description'][$i],
                'production_component_id' =>$productionComponent_id,
                'status' =>0,
            ];


            $insertProductionMaterialDetail=DB::table('production_component_detail')->insert($data);

        }

        if ($insertProductionMaterial && $insertProductionMaterialDetail){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }

    }

    // ------------------------------------------------ Receive Component ------------------------------------ //
    public function allComponentRequisition()
    {
        $components=DB::table('component')->get();

        $orders=DB::table('production_component')
            ->join('production_component_detail',
                'production_component_detail.production_component_id','=','production_component.id')
                ->orderBy('production_component.id','desc')
                ->get();

       //dd($orders);
        return view('production::Order/recieved_component',compact('orders'
            ,'components'));
    }



    public function receiveComponent(Request $request)
    {
        DB::table('production_component_detail')->where('id',$request->id)
            ->update(['status'=>5]);

        $component=DB::table('production_component_detail')
            ->where('id',$request->id)
            ->first();

       //dd($component);

       $newQuantity= $component->quantity;

        $count=DB::table('production_component_store')->where('name',$request->name)->count();

        if($count>0)
        {
            $oldComponent=DB::table('production_component_store')->where('name',$request->name)->first();

            $currentQuantity=$oldComponent->quantity;
            $latestQuantity=$currentQuantity+$newQuantity;

            DB::table('production_component_store')
                ->where('name',$request->name)
                ->update(['quantity'=>$latestQuantity]);
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            //dd('new one');
            DB::table('production_component_store')->insert([
                'name' => $component->component_name,
                'type'=> 'Component',
                'quantity'=>$component->quantity,
            ]);

            return redirect()->back()->with('save', 'Saved Successfully');
        }

        return redirect()->back()->with('save','Changed Status Successfully');
    }

    public function allMaterialRequisition()
    {
        $components=DB::table('component')->get();

        $orders=DB::table('production_material')
            ->join('production_material_detail',
                'production_material_detail.production_material_id','=','production_material.id')
            ->orderBy('production_material.id','desc')
            ->get();

        // dd($orders);
        return view('production::Order/recieved_material',compact('orders'
            ,'components'));
    }

    public function receiveMaterial(Request $request)
    {
        DB::table('production_material_detail')->where('id',$request->id)
            ->update(['status'=>5]);

//        $component=DB::table('production_component_detail')
//            ->where('id',$request->id)
//            ->first();
//
//        //dd($component);
//
//        $newQuantity= $component->quantity;
//
//        $count=DB::table('production_component_store')->where('name',$request->name)->count();
//
//        if($count>0)
//        {
//            $oldComponent=DB::table('production_component_store')->where('name',$request->name)->first();
//
//            $currentQuantity=$oldComponent->quantity;
//            $latestQuantity=$currentQuantity+$newQuantity;
//
//            DB::table('production_component_store')
//                ->where('name',$request->name)
//                ->update(['quantity'=>$latestQuantity]);
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            //dd('new one');
//            DB::table('production_component_store')->insert([
//                'name' => $component->component_name,
//                'type'=> 'Component',
//                'quantity'=>$component->quantity,
//            ]);
//
//            return redirect()->back()->with('save', 'Saved Successfully');
//        }


        return redirect()->back()->with('save','Changed Status Successfully');
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
