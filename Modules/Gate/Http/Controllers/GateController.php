<?php

namespace Modules\Gate\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addInwardGatePass(Request $request){
        dd($request->all());

        $vendor = DB::table('supplier')->find($request->ven_id);

//        dd($request->po_num);
        $por=DB::table('purchase_order_approval')->where('id',$request->po_num)->first();

//        dd($por->requisition_id);
        $data=[
            'gatePassId' => $request->gatePassId,
            'requisition_id'=>$por->requisition_id,
            'purchase_order_id'=>$por->purchase_order_id,
            'driverId' => $request->driverId,
            'driverName' => $request->driverName,
            'driverPh' => $request->driverPh,
            'vehicalNo' => $request->vehicalNo,

            'vendorType' => 'Registered Vendor',
            'vendorId' => $vendor->supplier_id,
            'vendorName' => $vendor->name,
            'vendorAddress' => $vendor->city,
            'vendorPh' => $vendor->p_number	,

            'date' => date('Y-m-d'),
            'status' => 0
        ];

        $insertInwardGatePass=DB::table('inward_gate_pass')->insert($data);

        $size = sizeof($request->material_name);

        for($i=0 ; $i<$size ; $i++){
            $data=[
                'requisition_id'=>$por->requisition_id,
                'purchase_order_id'=>$por->purchase_order_id,
                'itemType' => 'Material',
                'materialName' => $request['material_name'][$i],
                'uom' => $request['uom'][$i],
                'qty' => $request['qty_received'][$i],
                'order_qty' => $request['qty'][$i],
                'description' => $request['description'][$i],
                'gatePassId' => $request->gatePassId,
                'date' => date('Y-m-d'),
                'status' => 0
            ];
            $insertInwardRawMaterial=DB::table('inward_raw_material')->insert($data);
        }

        if ($insertInwardGatePass && $insertInwardRawMaterial){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }

    }


    public function poDetails($data){
        if ($data == 'po'){
            $PO=DB::table('purchase_order_approval')->where('status', 3)->get();

            return view('gate::gate.purchaseRight', compact('PO'));
        }else{
            $requisitions=DB::table('purchase_requisitions')->get();

            return view('gate::gate.reqRight', compact('requisitions'));
        }

    }




    public function inwardGatePass()
    {

        $supplier=DB::table('supplier')->get();
        $units=DB::table('unit')->get();
        $stores=DB::table('store')->get();
        $countInwardGatePass=DB::table('inward_gate_pass')->select('gatePassId')->orderByDesc('id')->first();
        if(empty($countInwardGatePass)){
            $countInwardGatePass=1;
        }
        else{
            $countInwardGatePass=substr($countInwardGatePass->gatePassId,4);
            ++$countInwardGatePass;
        }
//        $PO=DB::table('purchase_order_approval')->where('status', 3)->get();
//        $requisitions=DB::table('purchase_requisitions')->get();
//        dd($requisitions);
//        'purchase_order_id'
//        foreach ($PO as $key=>$row){
//            $purchase_order_id=$row->purchase_order_id;
//            $vendor_id=$row->vendor_id;
//        }
//        dd($purchase_order_id,$vendor_id);
//        dd($PO);

        return view('gate::gate/inwardGatePass', compact('countInwardGatePass', 'supplier', 'stores', 'units'));
    }
    public function outwardGatePass(){

        return view('gate::gate/outwardGatePass');
    }

    public function vehicleManagement(){
        return view('gate::vehicle/vehicleManagement');
    }

    public function outVehicle()
    {
        $countOutVehicle=DB::table('vehicle_management')->select('record_id')->orderByDesc('id')->first();
        if(empty($countOutVehicle)){
            $countOutVehicle=1;
        }
        else{
            $countOutVehicle=substr($countOutVehicle->record_id,2);
            ++$countOutVehicle;
        }
        return view('gate::vehicle/outVehicle', compact('countOutVehicle'));
    }

    public function submitVehicleOut(Request $request){
        //dd($request);
        date_default_timezone_set("Asia/Karachi");
        $data=[
            'record_id' => $request->record_id,
            'vehicle_no' => $request->vehicle_no,
            'vehicle_name' => $request->vehicle_name,
            'from' => $request->from,
            'to' => $request->to,
            'out_time' => Carbon::now(),
            'out_meter_reading' => $request->out_meter_reading,
            'staff_id' => $request->staff_id,
            'staff_name' => $request->staff_name,
            'status' => 0
        ];
        $insert=DB::table('vehicle_management')->insert($data);

        if ($insert){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }

    }

    public function inVehicle(){
        $vehicles=DB::table('vehicle_management')->get();

        return view('gate::vehicle/inVehicle', compact('vehicles'));
    }

    public function submitInVehicle(Request $request){
        $id=$request->sendId;
        if ($id!=0 || $id!='' || $id!=null){
            $out_meter_reading=$request->out_meter_reading;
            $in_meter_reading=$request->in_meter_reading;
            if ($in_meter_reading > $out_meter_reading){
                $distance=$in_meter_reading-$out_meter_reading;
                $data=[
                    'in_meter_reading' => $in_meter_reading,
                    'in_time' => Carbon::now(),
                    'distance' => $distance,
                    'status' => 1
                ];
                $update=DB::table('vehicle_management')->where('id', $id)->update($data);


                if ($update){
                    return redirect()->back()->with('message', 'Submitted Successfuly.');
                }
                else {
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else {
                return back()->withErrors( 'Meter Reading is Wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }








    public function dashboard()
    {
        return view('gate::dashboard/dashboard');
    }

    public function attendance()
    {
        return view('gate::attendance/attendance');
    }

    public function security()
    {
        return view('gate::security/security');
    }

//  ------------------- Rports ----------------------- //
    public function report()
    {
        return view('gate::report/report');
    }

    public function inward()
    {
        return view('gate::report/inward');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('gate::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('gate::create');
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
        return view('gate::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('gate::edit');
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
    public function vendor_data($id){
//      dd($id);
        $vendors=DB::table('purchase_order_approval')->find($id);
        $purchase_type=$vendors->purchase_type;
        $vend=$vendors->vendor_id;

        $purchase_items_details=DB::table('purchase_order_approval_detail')->where('po_id',$id)->get();
//        dd($purchase_items_details);
        $vend=DB::table('supplier')->find($vend);

            return view('gate::gate.vendor',compact('vend','purchase_type','purchase_items_details'));


    }

    public  function item_details($id){

        $purchase_items_details=DB::table('purchase_order_approval_detail')->where('po_id',$id)->get();

        return view('gate::gate.item-details', compact('purchase_items_details'));
    }

    public function requisition_detail($id){
//          dd($id);
          $req_data=DB::table('purchase_requisitions_detail')->where('req_id',$id)->get();
//          dd($req_data);
        return view('gate::gate.requisition_detail',compact('req_data'));
    }
}
