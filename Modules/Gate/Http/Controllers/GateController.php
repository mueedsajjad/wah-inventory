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
//        dd($request->all());
        if($request->type == 'requisition'){


            $data=[
                'gatePassId' => $request->gatePassId,
                'requisition_id'=>$request->reqisition_id,
                'driverId' => $request->driverId,
                'driverName' => $request->driverName,
                'driverCNIC' => $request->driverCNIC,
                'driverPh' => $request->driverPh,
                'vehicalNo' => $request->vehicalNo,
                'date' => date('Y-m-d'),
                'status' => 0

            ];
            $insertInwardGatePass=DB::table('inward_gate_pass')->insert($data);
            $size = sizeof($request->material_name);

            for($i=0 ; $i<$size ; $i++){

                $data=[

                    'requisition_id'=>$request->reqisition_id,
                    'itemType' => 'Component',
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
//                dd('inserted in raw material');
            }



            if ($insertInwardGatePass && $insertInwardRawMaterial){
                return redirect()->back()->with('message', 'Submitted Successfully.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }

        }
        elseif ($request->type == 'purchase'){

//            dd($request->all());
            $vendor = DB::table('supplier')->find($request->ven_id);
//            dd($vendor);
//        dd($request->po_num);
            $por=DB::table('purchase_order_approval')->where('id',$request->po_num)->first();

//        dd($por->requisition_id);
            if ($vendor==null){
                $data=[
                    'gatePassId' => $request->gatePassId,
                    'requisition_id'=>$por->requisition_id,
                    'purchase_order_id'=>$por->purchase_order_id,
                    'driverId' => $request->driverId,
                    'driverName' => $request->driverName,
                    'driverCNIC' => $request->driverCNIC,
                    'driverPh' => $request->driverPh,
                    'vehicalNo' => $request->vehicalNo,


                    'date' => date('Y-m-d'),
                    'status' => 0
                ];

            }
            else{
            $data=[
                'gatePassId' => $request->gatePassId,
                'requisition_id'=>$por->requisition_id,
                'purchase_order_id'=>$por->purchase_order_id,
                'driverId' => $request->driverId,
                'driverName' => $request->driverName,
                'driverCNIC' => $request->driverCNIC,
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
            }

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
        elseif ($request->factory=='factory_inward'){
                $req1= "FI-".random_int(999,9999);
            $data=[
                'gatePassId' => $request->gatePassId,
                'requisition_id'=>$req1,
                'driverId' => $request->driverId,
                'driverName' => $request->driverName,
                'driverCNIC' => $request->driverCNIC,
                'driverPh' => $request->driverPh,
                'vehicalNo' => $request->vehicalNo,


                'date' => date('Y-m-d'),
                'status' => 0
            ];

            $insertInwardGatePass=DB::table('inward_gate_pass')->insert($data);

            $size = sizeof($request->componentName);

            for($i=0 ; $i<$size ; $i++){
                $data=[
                    'itemType' => 'Component',
                    'requisition_id'=>$req1,
                    'materialName' => $request['componentName'][$i],
                    'uom' => $request['uom'][$i],
                    'qty' => $request['qty'][$i],
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


//        dd($request->all());


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
        $countInwardGatePass=DB::table('inward_gate_pass')->select('gatePassId')->orderByDesc('id')->first();
        if(empty($countInwardGatePass)){
            $countInwardGatePass=1;
        }
        else{
            $countInwardGatePass=substr($countInwardGatePass->gatePassId,4);
            ++$countInwardGatePass;
        }

        return view('gate::gate/outwardGatePass',compact('countInwardGatePass'));
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


    public function inward_current_month(Request $request)
    {
        $report_data=DB::table('inward_gate_pass')->whereMonth('date',date('m'))->whereYear('date',date('Y'))->get();
        $report_dat_one=DB::table('inward_gate_pass')->where('requisition_id', 'LIKE', '%FI-%')->whereMonth('date',date('m'))->whereYear('date',date('Y'))->get();
//        dd($report_data);

        $report_modal_data=DB::table('inward_raw_material')->whereMonth('date',date('m'))->whereYear('date',date('Y'))->get();
//        dd($report_modal_data);

        return view('gate::report/inward',compact('report_data','report_modal_data','report_dat_one'));
    }

    public function inward_date(Request $request)
    {
        $from = $request->fromDate;
        $to = $request->toDate;
        $report_data=DB::table('inward_gate_pass')->whereBetween('date', [$from,$to])->get();
        $report_dat_one=DB::table('inward_gate_pass')->where('requisition_id', 'LIKE', '%FI-%')->whereBetween('date', [$from,$to])->get();
//        dd($report_data);

        $report_modal_data=DB::table('inward_raw_material')->whereBetween('date', [$from,$to])->get();
//        dd($report_modal_data);

        return view('gate::report/inward',compact('report_data','report_modal_data','report_dat_one'));
    }

    public function inward()
    {

        $report_data=DB::table('inward_gate_pass')->get();
        $report_dat_one=DB::table('inward_gate_pass')->where('requisition_id', 'LIKE', '%FI-%')->get();
//        dd($report_data);

        $report_modal_data=DB::table('inward_raw_material')->get();
//        dd($report_modal_data);

        return view('gate::report/inward',compact('report_data','report_modal_data','report_dat_one'));
    }
    public function inward_report($id){

        $data=DB::table('inward_gate_pass')->where('id',$id)->first();
        $gatePassId=$data->gatePassId;
        $report_details=DB::table('inward_raw_material')->where('gatePassId',$gatePassId)->get();
//        dd($report_details);
        return view('gate::report/inward_report_details',compact('data','report_details'));
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

            public function outward_customer($id){
              $delivery_data=DB::table('sale_order')->where('status',2)->get();
//              dd($delivery_data);

                return view('gate::gate.customer_data',compact('delivery_data'));
            }
            public function delivery_order($id){
              $delivery_data=DB::table('sale_order')->where('so_number',$id)->first();
//              dd($delivery_data);
                $item_detail=DB::table('sale_order_products')->where('so_number',$id)->get();
//                dd($item_detail);
                return view('gate::gate.Delivery_data',compact('delivery_data','item_detail'));
            }
            public function delivery_order_table($id){

              $table_data=DB::table('sale_order_products')->where('so_number',$id)->get();
               return view('gate::gate.Delivery_data_table',compact('table_data'));

            }


            public function outward_factory_component($id){


                $component = DB::table('production_component_detail')->where('gate_type', 'outward')->where('status',4)->get();


                return view('gate::gate.factory_data_component', compact('component'));
            }


            public function outward_factory_material($id){
//                dd('Bilal');
                $material = DB::table('production_material_detail')->where('gate_type', 'outward')->where('status',4)->get();
//                dd($material);
                return view('gate::gate.factory_data_material', compact('material'));

            }


            public function getDataMaterial($id){
                $details = DB::table('production_material_detail')->where('id', $id)->where('status',4)->get();;
//                dd($details);
                return view('gate::gate.table', compact('details'));

            }


                public function getDataComponent($id){
//                     dd($id);
                    $details = DB::table('production_component_detail')->where('id', $id)->where('status',4)->get();
                    return view('gate::gate.tableComponent', compact('details'));

                }

                public function addOutwardGatePass(Request $request){
//                 dd($request->all());
                 if ($request->out_t=="customer"){
                     DB::table('sale_order')->where('so_number',$request->order_num)->update(array('status' => '3'));
                     return redirect()->back()->with('message', 'Submitted Successfuly.');
                 }
                 else{

                     if ($request->product_type=="component"){
                         $component=DB::table('production_component_detail')->where('id',$request->out_type)->update(array('status' => '5'));
                         return redirect()->back()->with('message', 'Submitted Successfuly.');
                     }
                     else
                         $material=DB::table('production_material_detail')->where('id',$request->out_type)->update(array('status' => '5'));
                     return redirect()->back()->with('message', 'Submitted Successfuly.');
                 }
                }

                public function outward_report (){
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



                   return view('gate::report/outward_report',compact('report_data','component','delivery_report'));
                }

                public  function out_report($id){

                    $report_data=DB::table('production_material_detail')->where('production_material_id',$id)->where('status',5)->get();
//                      dd($report_data);
                    $data=DB::table('production_material')->where('id',$id)->first();
//                    dd($data);

                      return view('gate::report/outward_report_details',compact('report_data','data'));
                }
                public function component_out_report($id){

                    $report_data=DB::table('production_component_detail')->where('production_component_id',$id)->where('status',5)->get();
//                    dd($report_data);
                    $data=DB::table('production_component')->where('id',$id)->first();
                    return view('gate::report/out_component_report',compact('report_data','data'));

                }
                public function out_delivery_report($id){
//                  dd($id);
                  $delivery_details=DB::table('sale_order')->where('so_number',$id)->first();
//                  dd($delivery_details);
                  $delivery_table=DB::table('sale_order_products')->where('so_number',$id)->get();
//                  dd($delivery_table);
                  return view('gate::report/out_delivery_report',compact('delivery_details','delivery_table'));
                }

                public function vehicle_report(){
                  $vehicle_data=DB::table('vehicle_management')->where('status',1)->get();
//                  dd($vehicle_data);


                  return view('gate::report/vehicle_report',compact('vehicle_data'));
                }
}
