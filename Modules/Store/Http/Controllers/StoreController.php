<?php

namespace Modules\Store\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function date_filter(Request $request)
    {
        $from = $request->fromDate;
        $to = $request->toDate;
        $inward_gate_pass = DB::table('inward_gate_pass')->whereBetween('date', [$from,$to])->paginate(10);
//      dd($inward_gate_pass);
        return view('store::newBuiltyArrival', compact('inward_gate_pass'));

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('store::dashboard/dashboard');
    }
//  -------------------- Materil --------------------- //
    public function rawMaterial()
    {
        $material=DB::table('material')->where('category','Materials')->get();
        $units=DB::table('unit')->get();
        $stores=DB::table('store')->get();
        $categories=DB::table('category')->get();
        return view('store::material/rawMaterial', compact('material', 'units' , 'stores', 'categories'));
    }
    public function addMaterial()
    {
        $units=DB::table('unit')->get();
        $stores=DB::table('store')->get();
        $categories=DB::table('category')->get();
        return view('store::material/addMaterial', compact('units' , 'stores', 'categories'));
    }

    public function submitNewMaterial(Request $request){
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'uof' => $request->uof,
            'qty' => $request->qty,
            'storeLocation' => $request->storeLocation,
            'status' => $request->status,
            'rate' => $request->rate,
            'date' => date('Y-m-d')
        ];
        $insertMaterial=DB::table('material')->insert($data);

        if ($insertMaterial){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function submitEditedMaterial(Request $request){
        $data=[
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'uof' => $request->uof,
            'qty' => $request->qty,
            'storeLocation' => $request->storeLocation,
            'status' => $request->status,
            'rate' => $request->rate,
            'date' => date('Y-m-d')
        ];
        $updateMaterial=DB::table('material')->where('id', $request->materialId)->update($data);

        if ($updateMaterial){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function deleteMaterial(Request $request){
        $materialId=$request->materialId;
        if($materialId!=0 || $materialId!=null || $materialId!=''){
            $deleteMaterial=DB::table('material')->where('id', $materialId)->delete();

            if ($deleteMaterial){
                return redirect()->back()->with('message', 'Deleted Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }
//  -------------------- ./ Ending Material --------------------- //


//  -------------------- Product --------------------- //
    public function product()
    {
        $products=DB::table('material')->where('category','Products')->get();
        $units=DB::table('unit')->get();
        $stores=DB::table('store')->get();
        $categories=DB::table('category')->get();
        return view('store::product/product', compact('products', 'units' , 'stores', 'categories'));
    }

    public function newBuiltyArrival(){
        $inward_gate_pass=DB::table('inward_gate_pass')->where('requisition_id', 'LIKE', '%PR-%')->get();
        return view('store::newBuiltyArrival', compact('inward_gate_pass'));
    }

    public function newBuiltyArrival_outward(){
        $inward_gate_pass=DB::table('inward_gate_pass')->where('requisition_id', 'LIKE', '%FI-%')->get();
//        dd($inward_gate_pass);
        return view('store::newBuiltyArrival_outward', compact('inward_gate_pass'));
    }


    public function viewBuiltyDetails_out($gatePassId)
    {
//        dd($gatePassId);
        if ($gatePassId!=0 || $gatePassId!=null || $gatePassId!=''){
            $inward_gate_pass=DB::table('inward_gate_pass')->where('id', $gatePassId)->first();
            $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $inward_gate_pass->gatePassId)->get();

//            dd($inward_gate_pass);
//            dd('moms');
            return view('store::table_append_out', compact('inward_raw_material','inward_gate_pass'));
        }
        else {
            return json_encode(['error'=> 'error']);
        }
    }


    public function viewBuiltyDetails($gatePassId)
    {
//        dd($gatePassId);
        if ($gatePassId!=0 || $gatePassId!=null || $gatePassId!=''){
            $inward_gate_pass=DB::table('inward_gate_pass')->where('id', $gatePassId)->first();
            $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $inward_gate_pass->gatePassId)->get();

//            dd($inward_gate_pass);
//            dd('moms');
            return view('store::table_append', compact('inward_raw_material','inward_gate_pass'));
        }
        else {
            return json_encode(['error'=> 'error']);
        }
    }



    public function changeUnloadStatus_out(Request $request)
    {
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){
            $data=[
                'status' => 1
            ];
            $data_one=[
                'status' => 2
            ];
//            dd($gatepassid);
            $update=DB::table('inward_gate_pass')->where('gatePassId', $gatepassid)->update($data);

            $updateinward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)->update($data_one);

            if ($update && $updateinward_raw_material){
                return redirect()->back()->with('message', 'Updated Status Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }



    public function changeUnloadStatus(Request $request)
    {
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){
            $data=[
                'status' => 1
            ];
            $data_one=[
                'status' => 2
            ];
//            dd($gatepassid);
            $update=DB::table('inward_gate_pass')->where('gatePassId', $gatepassid)->update($data);

            $updateinward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)->update($data_one);

            if ($update && $updateinward_raw_material){
                return redirect()->back()->with('message', 'Updated Status Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }


    public function productionProduct()
    {
        $stores=DB::table('store')->get();
        $products=DB::table('production_order')
            ->join('transfer_request_store','production_order.id','transfer_request_store.order_id')
            ->where('status',4)
            ->get();

        return view('store::dashboard/product', compact('products','stores'));
    }

    public function approveForInspectionNote(){
        $stores=DB::table('store')->get();
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 1)
            ->orWhere('status', 2)->orWhere('status', 3)
            ->orWhere('status', 4)->orWhere('status', 5)
            ->orWhere('status', 6)->get();
        return view('store::approveForInspectionNote', compact('stores', 'inward_raw_material'));
    }

    public function submitAssignedStore(Request $request,$id){
//        dd($id);
        if ($id!=0 || $id!=null || $id!=''){
            $itemType=$request->itemType;
            $storeLocation=$request->storeLocation;
            $data=[
                'storeLocation' => $storeLocation
            ];

            if ($itemType=="Material" && ($storeLocation=="Magazine 1" || $storeLocation=="Magazine 2")){
                $update=DB::table('inward_raw_material')->where('id', $id)
                    ->where('materialName', $request->materialName)->update($data);
            }
            elseif ($itemType=="Component" && ($storeLocation=="Components")){
                $update=DB::table('inward_raw_material')->where('id', $id)
                    ->where('materialName', $request->materialName)->update($data);
            }
            else{
                return back()->withErrors( 'Please Select the Item Relevant Store.');
            }

            if ($update){
                return redirect()->back()->with('message', 'Updated Store Successfully.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }
    public  function assignStore()
    {
        return view('store::dashboard/assignStore');
    }


    public function sendForInspection(Request $request){
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){

            $checkStore=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)
                ->where('materialName', $request->materialname)->first();
            $checkStore=$checkStore->storeLocation;

//            if ($checkStore){
            $data=[
                'status' => 2
            ];
            $update=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)
                ->where('materialName', $request->materialname)->update($data);

            if ($update){
                return redirect()->back()->with('message', 'Sent for Inspection Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
//            }
//            else {
//                return back()->withErrors( 'Kindly, First assign a store.');
//            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function inwardInspectionNote_date(Request $request)
    {
        $inward_raw_material=[];
//        dd('faizan');
        $from = $request->fromDate;
        $to = $request->toDate;
//        dd($request->all());
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 2)->whereBetween('date', [$from,$to])->orWhere('status', 3)->whereBetween('date', [$from,$to])->orWhere('status', 4)->whereBetween('date', [$from,$to])->orWhere('status', 5)->whereBetween('date', [$from,$to])->orWhere('status', 6)->whereBetween('date', [$from,$to])->get();


//        dd($inward_raw_material);
        return view('store::inwardInspectionNote', compact( 'inward_raw_material'));
    }

    public function sale_storing(Request $request)
    {
        $so=DB::table('sale_order')->where('id',$request->so_id)->first();
//        dd($so->so_number);
        $sop=DB::table('sale_order_products')->where('so_number',$so->so_number)->first();
        $order_quantity=$sop->qty;


        $store=DB::table('store_stock')->where('name','Kartoos')->where('store_location','Finished Goods 1')->first();
//        dd($store->id);
        $store_quantity=$store->quantity;
        if($store_quantity > $order_quantity)
        {
            $store_quantity=$store_quantity-$order_quantity;
            $data=[
                'quantity' => $store_quantity
            ];
            $update=DB::table('store_stock')->where('id', $store->id)->update($data);
        }
        else
        {
            return back()->withErrors( 'You have less quantity in the store.');
        }



        $data=[
            'driver_id' => $request->driver_cnic,
            'driver_name' => $request->driver_name,
            'vehicle_number' => $request->vehicle_number,
            'status' => 2
        ];
        $update=DB::table('sale_order')->where('id', $request->id_st)->update($data);

        return redirect()->back();
    }

    public function sales_list()
    {
        $sales_list=DB::table('sale_order')->where('status',1)->orwhere('status',2)->orwhere('status',3)->get();
        return view('store::sale/sale_list',compact('sales_list'));
    }
    public function saling($id)
    {
//        dd($id);
        $sale=DB::table('sale_order')->where('id',$id)->first();
//        dd($sale);
        return view('store::sale/sale',compact('sale'));
    }
    public function add_i_note_qc($id)
    {
//        dd($id);
        $view=[];
        $gate=DB::table('inward_gate_pass')->where('id',$id)->first();
//        dd($gate);
        $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId',$gate->gatePassId)->get();
//        dd($material);
        foreach ($inward_raw_material as $in)
        {
            $view=$in;
        }
//        dd($view);
        return view('store::add_i_note_qc',compact('inward_raw_material','gate','view'));
    }

    public function inwardInspectionNote()
    {
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 2)
            ->orWhere('status', 3)->orWhere('status', 4)
            ->orWhere('status', 5)->orWhere('status', 6)->get();
        $inward_gate_pass=DB::table('inward_gate_pass')->get();
//        dd($inward_gate_pass);
//        $inward_raw_material=[];
//        foreach($inward_gate_pass as $gate)
//        {
//            $inward_raw_material[]=$inward_raw_material=DB::table('inward_raw_material')->where('status', 2)->where('gatePassId',$gate->gatePassId)->get();
//        }
//        dd($inward_raw_material);

        return view('store::inwardInspectionNote', compact( 'inward_raw_material','inward_gate_pass'));
    }




    public function submitInwardInspectionNote(Request $request){

//        dd($request->detail_id);
        $size = sizeof($request->inspectionStatus);

        for ($i = 0; $i < $size; $i++) {
            $data=[
                'inspectionDate' => date('Y-m-d'),
                'inspectionStatus' => $request->inspectionStatus[$i],
                'rejectionReason' => $request->rejectionReason[$i],
                'rejectedQty' => $request->rejectedQty[$i],
            ];
            $update=DB::table('inward_raw_material')->where('id', $request->detail_id[$i])->update($data);
        }
        return redirect()->back()->with('message', 'Updated Successfuly.');


//        $submitId=$request->submitId;
//        if ($submitId!=0 || $submitId!=null || $submitId!='') {
//            $data=[
//                'inspectionDate' => date('Y-m-d'),
//                'inspectionStatus' => $request->inspectionStatus,
//                'rejectionReason' => $request->rejectionReason,
//                'rejectedQty' => $request->rejectedQty
//            ];

//            $update=DB::table('inward_raw_material')->where('gatePassId', $request->submitId)->update($data);
//
//            if ($update){
//                return redirect()->back()->with('message', 'Updated Successfuly.');
//            }
//            else {
//                return back()->withErrors( 'Something went wrong.');
//            }
    }

    public function sendForInwardReceipt(Request $request){
//        dd($request->detail_id);
        $raw_id=[];
        $sendId=$request->sendId;
        $gate=DB::table('inward_gate_pass')->where('id',$sendId)->first();
        $raw=DB::table('inward_raw_material')->where('gatePassId',$gate->gatePassId)->get();
        foreach ($raw as $r)
        {
            $raw_id[]=$r->id;
        }
//        dd($raw_id);
        $size = sizeof($raw);
//        dd($size);
        for ($i = 0; $i < $size; $i++)
        {
            $data=[
                'status' => 3
            ];
            $update=DB::table('inward_raw_material')->where('id', $raw_id[$i])->update($data);
        }
        return redirect()->back()->with('message', 'Sent for Recepit Successfuly.');
//        if ($sendId!=0 || $sendId!=null || $sendId!=''){
//
//            $checkStore=DB::table('inward_raw_material')->where('id', $sendId)->first();
//            $checkInspection=$checkStore->inspectionDate;
//
//            if ($checkInspection){
//                $data=[
//                    'status' => 3
//                ];
//                $update=DB::table('inward_raw_material')->where('id', $sendId)->update($data);
//
//                if ($update){
//                    return redirect()->back()->with('message', 'Sent for Recepit Successfuly.');
//                }
//                else {
//                    return back()->withErrors( 'Something went wrong.');
//                }
//            }
//            else {
//                return back()->withErrors( 'Kindly, First Add a Note.');
//            }
//        }
//        else {
//            return back()->withErrors( 'Something went wrong.');
//        }
    }

    public function inwardGoodsReceipt()
    {
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 3)
            ->orWhere('status', 4)->orWhere('status', 5)
            ->orWhere('status', 6)->get();
        $inward_gate_pass=DB::table('inward_gate_pass')->get();
        return view('store::inwardGoodsReceipt', compact('inward_raw_material','inward_gate_pass'));
    }

    public function writeInwardGoodsReceipt($id, $gatePassId)
    {
//        dd($request->all());
//        dd($id);
        $cost=[];
        if ($id!=null || $id!=0 || $id!=''){

            $countInwardGoodsReceipt=DB::table('inward_goods_receipt')->select('grn')->orderByDesc('id')->first();
//            dd($countInwardGoodsReceipt);
            if(empty($countInwardGoodsReceipt)){
                $countInwardGoodsReceipt=1;
            }
            else{
                $countInwardGoodsReceipt=substr($countInwardGoodsReceipt->grn,5);
                ++$countInwardGoodsReceipt;
            }
            $stores=DB::table('store')->get();
            $gate=DB::table('inward_gate_pass')->where('gatePassId', $gatePassId)->first();
            $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gate->gatePassId)->get();
            $mat_raw=DB::table('inward_raw_material')->where('gatePassId', $gate->gatePassId)->first();
            $pop=DB::table('purchase_order_approval')->where('purchase_order_id',$mat_raw->purchase_order_id)->first();
            $inward_gate_pass=DB::table('inward_gate_pass')->where('gatePassId', $gatePassId)->first();
            foreach ($inward_raw_material as $r_m)
            {
                $cost[]=DB::table('purchase_order_approval_detail')->where('purchase_order_id',$r_m->purchase_order_id)->where('material_name',$r_m->materialName)->first();

            }
//                        dd($id);
            return view('store::writeInwardGoodsReceipt', compact('mat_raw','cost','pop','inward_raw_material', 'inward_gate_pass', 'stores','countInwardGoodsReceipt','id'));
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function submitInwardGoodsReceipt(Request $request){
        $purchase_from_a=DB::table('purchase_order_approval')->where('purchase_order_id',$request->purchaseOrderNo)->first();
        $sizing=sizeof($request->materialName);
//        dd($request->all());
//        dd($purchase_from_a->purchase_type);
        for ($i = 0; $i < $sizing; $i++) {
            $id = $request->inward_raw_material_id[$i];

            if ($request->inward_raw_material_id[$i] != 0 || $request->inward_raw_material_id[$i] != null || $request->inward_raw_material_id[$i] != '') {
                $itemType = $request->itemType[$i];
                $storeLocation = $request->storeLocation[$i];
                $data = [
                    'storeLocation' => $storeLocation
                ];

                if ($request->itemType[$i] == "Material" && ($request->storeLocation[$i] == "Magazine 1" || $request->storeLocation[$i] == "Magazine 2")) {
                    $update = DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id[$i])
                        ->where('materialName', $request->materialName[$i])->update($data);
                } elseif ($request->itemType[$i] == "Component" && ($request->storeLocation[$i] == "Components")) {
                    $update = DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id[$i])
                        ->where('materialName', $request->materialName[$i])->update($data);
                } else {
                    return back()->withErrors('Please Select the Item Relevant Store.');
                }

//            if ($update){
//                return redirect()->back()->with('message', 'Updated Store Successfully.');
//            }
//            else {
//                return back()->withErrors( 'Something went wrong in store assign.');
//            }
            } else {
                return back()->withErrors('Something went wrong in store assign.');
            }


            if ($request->hasFile('document')) {

                $validator = request()->validate([
                    'document' => 'file|mimes:pdf',
                ]);
                if (!$validator) {
                    return back()->withErrors();
                }

                $file = $request->file('document')[$i];
                $name = $file->getClientOriginalName();
                $path = public_path('upload');
                $file->move($path, $name);
                $document = $name;
            } else {
                $document = null;
            }

            $data = [
                'grn' => $request->grn,
                'grnDate' => date('Y-m-d'),
                'document' => $document,
                'purchasedFrom' => $purchase_from_a->purchase_type,
                'gatePassId' => $request->gatePassId,
                'totalCost' => $request->totalCost[$i],
                'name' => $request->name,
                'purchaseOrderNo' => $request->purchaseOrderNo,
                'materialName' => $request->materialName[$i],
                'uom' => $request->uom[$i],
                'description' => $request->description[$i],
                'totalQuantity' => $request->totalQuantity[$i],
            ];
            $insert = DB::table('inward_goods_receipt')->insert($data);

            $data = [
                'status' => 4
            ];
            $update = DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id[$i])->update($data);


        }
        return redirect('store/inwardGoodsReceipt')->with('message', 'Submitted Successfuly.');
    }

    public function changeInwardReceiptApprovalStatus(Request $request){
        $id=$request->sendId;
        $i=DB::table('inward_raw_material')->where('id',$id)->first();
        $idss=DB::table('inward_raw_material')->where('gatePassId',$i->gatePassId)->get();
        foreach ($idss as $ii)
        {
            $r[]=$ii->id;
        }
        $siz=sizeof($r);
//        dd($siz);
        for ($i = 0; $i < $siz; $i++) {
            if ($r[$i] != 0 || $r[$i] != null || $r[$i] != '') {
                $checkMakeReceiptStatus = DB::table('inward_raw_material')->where('id', $r[$i])->first();
                $checkMakeReceiptStatus = $checkMakeReceiptStatus->status;

                if ($checkMakeReceiptStatus == 4) {
                    $data = [
                        'status' => 5
                    ];
                    $update = DB::table('inward_raw_material')->where('id', $r[$i])->update($data);
                } else {
                    return back()->withErrors('Kindly first make the Receipt.');
                }
            } else {
                return back()->withErrors('Something went wrong.');
            }
        }
        return redirect()->back()->with('message', 'Submitted Successfuly.');
    }

    //    ------------------------------ Products Came Form Production ----------------------------- //
    public function assignStoreToFactoryInMadeProducts()
    {
        $stores=DB::table('store')->get();
        $products=DB::table('production_order')->where('status',5)
            ->orWhere('status',6)
            ->get();
        return view('store::dashboard/assignStoreToFactoryInMadeProducts', compact('products','stores'));
    }

    public function submitFactoryInMadeProductsToStore(Request $request){
        //dd($request);
        $data=[
            'manufacturing_order' => $request->manufacturing_order,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'total_cost' => $request->total_cost,
            'stored_date' => date('Y-m-d'),
            'status' => 0
        ];
        $dataStatus=[
            'status' => 6
        ];

        if ($request->store_location=="Finished Goods 1"){
            $insert=DB::table('store_finished_goods_1')->insert($data);
            $statusChange=DB::table('production_order')->where('id', $request->product_id)->update($dataStatus);
            if ($insert && $statusChange){
                $checkNameInStock=DB::table('store_stock')->where('name', $request->name)
                    ->where('store_location', $request->store_location)->first();
                if (!empty($checkNameInStock)){
                    $oldquantity=$checkNameInStock->quantity;
                    $newquantity=$request->quantity;
                    $quantity=$oldquantity+$newquantity;
                    $updateDataStock=[
                        'quantity' => $quantity,
                        'date_updated' => Carbon::today()
                    ];
                    $updateInStoreStock=DB::table('store_stock')->where('name', $request->name)
                        ->where('store_location', $request->store_location)->update($updateDataStock);
                    if ($updateInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    $insertDataStock=[
                        'name' => $request->name,
                        'quantity' => $request->quantity,
                        'store_location' => $request->store_location,
                        'date_updated' => Carbon::today()
                    ];
                    $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                    if ($insertInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
            }
        }
        elseif ($request->store_location=="Finished Goods 2"){
            $insert=DB::table('store_finished_goods_2')->insert($data);
            $statusChange=DB::table('production_order')->where('id', $request->product_id)->update($dataStatus);
            if ($insert && $statusChange){
                $checkNameInStock=DB::table('store_stock')->where('name', $request->name)
                    ->where('store_location', $request->store_location)->first();
                if (!empty($checkNameInStock)){
                    $oldquantity=$checkNameInStock->quantity;
                    $newquantity=$request->quantity;
                    $quantity=$oldquantity+$newquantity;
                    $updateDataStock=[
                        'quantity' => $quantity,
                        'date_updated' => Carbon::today()
                    ];
                    $updateInStoreStock=DB::table('store_stock')->where('name', $request->name)
                        ->where('store_location', $request->store_location)->update($updateDataStock);
                    if ($updateInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    $insertDataStock=[
                        'name' => $request->name,
                        'quantity' => $request->quantity,
                        'store_location' => $request->store_location,
                        'date_updated' => Carbon::today()
                    ];
                    $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                    if ($insertInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
            }
        }
        else {
            return back()->withErrors( 'Select the Product Relevant Store.');
        }
    }

    public function assignStoreToFactoryInMadeComponents(){
        $stores=DB::table('store')->get();
        $components=DB::table('component_order')->where('status',5)
            ->orWhere('status',6)
            ->get();
        return view('store::dashboard/assignStoreToFactoryInMadeComponents', compact('components','stores'));

    }

    public function submitFactoryInMadeComponentsToStore(Request $request){
        $data=[
            'manufacturing_order' => $request->manufacturing_order,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'total_cost' => $request->total_cost,
            'stored_date' => date('Y-m-d'),
            'status' => 0
        ];
        $dataStatus=[
            'status' => 6
        ];

        if ($request->store_location=="Components"){
            $insert=DB::table('store_components')->insert($data);
            $statusChange=DB::table('component_order')->where('id', $request->component_id)->update($dataStatus);
        }
        else {
            return back()->withErrors( 'Select the Component Relevant Store.');
        }

        if ($insert && $statusChange){
            $checkNameInStock=DB::table('store_stock')->where('name', $request->name)
                ->where('store_location', $request->store_location)->first();
            if (!empty($checkNameInStock)){
                $oldquantity=$checkNameInStock->quantity;
                $newquantity=$request->quantity;
                $quantity=$oldquantity+$newquantity;
                $updateDataStock=[
                    'quantity' => $quantity,
                    'date_updated' => Carbon::today()
                ];
                $updateInStoreStock=DB::table('store_stock')->where('name', $request->name)
                    ->where('store_location', $request->store_location)->update($updateDataStock);
                if ($updateInStoreStock){
                    return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                }
                else {
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else{
                $insertDataStock=[
                    'name' => $request->name,
                    'quantity' => $request->quantity,
                    'store_location' => $request->store_location,
                    'date_updated' => Carbon::today()
                ];
                $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                if ($insertInStoreStock){
                    return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                }
                else {
                    return back()->withErrors( 'Something went wrong.');
                }
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function assignStoreToFactoryInwardMaterial(){
        $inward_raw_material=DB::table('inward_raw_material')->where('itemType' , 'Material')
            ->where(function($result) {
                $result->where("status" , 5)
                    ->orWhere('status' , 6);
            })
            ->get();
        return view('store::dashboard/assignStoreToFactoryInwardMaterial', compact('inward_raw_material'));
    }

    public function assignStoreToFactoryInwardComponents(){
        $inward_raw_material=DB::table('inward_raw_material')->where('itemType' , 'Component')
            ->where(function($result) {
                $result->where("status" , 5)
                    ->orWhere('status' , 6);
            })
            ->get();
        return view('store::dashboard/assignStoreToFactoryInwardComponents', compact('inward_raw_material'));
    }

    public function submitFactoryInwardMaterialToStore(Request $request){
        //dd($request);
        $data=[
            'materialName' => $request->materialName,
            'quantity' => $request->quantity,
            'uom' => $request->uom,
            'stored_date' => date('Y-m-d'),
            'status' => 0
        ];
        $dataStatus=[
            'status' => 6
        ];

        if ($request->storeLocation=="Magazine 1"){
            $insert=DB::table('store_magazine_1')->insert($data);
            $statusChange=DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id)->update($dataStatus);
            if ($insert && $statusChange){
                $checkNameInStock=DB::table('store_stock')->where('name', $request->materialName)
                    ->where('store_location', $request->storeLocation)->first();
                if (!empty($checkNameInStock)){
                    $oldquantity=$checkNameInStock->quantity;
                    $newquantity=$request->quantity;
                    $quantity=$oldquantity+$newquantity;
                    $updateDataStock=[
                        'quantity' => $quantity,
                        'date_updated' => Carbon::today()
                    ];
                    $updateInStoreStock=DB::table('store_stock')->where('name', $request->materialName)
                        ->where('store_location', $request->storeLocation)->update($updateDataStock);
                    if ($updateInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    $insertDataStock=[
                        'name' => $request->materialName,
                        'quantity' => $request->quantity,
                        'store_location' => $request->storeLocation,
                        'date_updated' => Carbon::today()
                    ];
                    $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                    if ($insertInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
            }
        }
        elseif ($request->storeLocation=="Magazine 2"){
            $insert=DB::table('store_magazine_2')->insert($data);
            $statusChange=DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id)->update($dataStatus);
            if ($insert && $statusChange){
                $checkNameInStock=DB::table('store_stock')->where('name', $request->materialName)
                    ->where('store_location', $request->storeLocation)->first();
                if (!empty($checkNameInStock)){
                    $oldquantity=$checkNameInStock->quantity;
                    $newquantity=$request->quantity;
                    $quantity=$oldquantity+$newquantity;
                    $updateDataStock=[
                        'quantity' => $quantity,
                        'date_updated' => Carbon::today()
                    ];
                    $updateInStoreStock=DB::table('store_stock')->where('name', $request->materialName)
                        ->where('store_location', $request->storeLocation)->update($updateDataStock);
                    if ($updateInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    $insertDataStock=[
                        'name' => $request->materialName,
                        'quantity' => $request->quantity,
                        'store_location' => $request->storeLocation,
                        'date_updated' => Carbon::today()
                    ];
                    $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                    if ($insertInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
            }
        }
        else {
            return back()->withErrors( 'Select the Material Relevant Store.');
        }
    }

    public function submitFactoryInwardComponentToStore(Request $request){
        $data=[
            'name' => $request->materialName,
            'quantity' => $request->quantity,
            'manufacturing_order' => 'Imported',
            //'uom' => $request->uom,
            'stored_date' => date('Y-m-d'),
            'status' => 0
        ];
        $dataStatus=[
            'status' => 6
        ];

        if ($request->storeLocation=="Components"){
            $insert=DB::table('store_components')->insert($data);
            $statusChange=DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id)->update($dataStatus);
            if ($insert && $statusChange){
                $checkNameInStock=DB::table('store_stock')->where('name', $request->materialName)
                    ->where('store_location', $request->storeLocation)->first();
                if (!empty($checkNameInStock)){
                    $oldquantity=$checkNameInStock->quantity;
                    $newquantity=$request->quantity;
                    $quantity=$oldquantity+$newquantity;
                    $updateDataStock=[
                        'quantity' => $quantity,
                        'date_updated' => Carbon::today()
                    ];
                    $updateInStoreStock=DB::table('store_stock')->where('name', $request->materialName)
                        ->where('store_location', $request->storeLocation)->update($updateDataStock);
                    if ($updateInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    $insertDataStock=[
                        'name' => $request->materialName,
                        'quantity' => $request->quantity,
                        'store_location' => $request->storeLocation,
                        'date_updated' => Carbon::today()
                    ];
                    $insertInStoreStock=DB::table('store_stock')->insert($insertDataStock);
                    if ($insertInStoreStock){
                        return redirect()->back()->with('message', 'Store Assigned Successfuly.');
                    }
                    else {
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
            }
        }
        else {
            return back()->withErrors( 'Select the Component Relevant Store.');
        }
    }

    public function allStores(){
        return view('store::allStores');
    }

    public function storeMagazine1(){
//        $magazine1=DB::table('store_magazine_1')->select('materialName','uom')->where('status', 0)->distinct()->get();
//        if (count($magazine1)){
//            $index=0;
//            foreach ($magazine1 as $item){
//                $totalQuantity=0;
//
//                $magazine1check=DB::table('store_magazine_1')->where('status', 0)->get();
//                foreach ($magazine1check as $data){
//                    if ($item->materialName==$data->materialName && $item->uom==$data->uom){
//                        $totalQuantity=$totalQuantity+$data->quantity;
//                    }
//                }
//
//                $materialName=$item->materialName;
//                $uom=$item->uom;
//
//                $storeMagazine1[$index]['materialName']=$materialName;
//                $storeMagazine1[$index]['uom']=$uom;
//                $storeMagazine1[$index]['totalQuantity']=$totalQuantity;
//                ++$index;
//            }
//        }
//        else{
//            $storeMagazine1=array();
//        }
        $storeStock=DB::table('store_stock')->where('store_location', "Magazine 1")->get();
        $magazine1=DB::table('store_magazine_1')->where('status', 0)->get();
        return view('store::storeMagazine1' , compact('magazine1', 'storeStock'));
    }

    public function storeMagazine2(){
        $storeStock=DB::table('store_stock')->where('store_location', "Magazine 2")->get();
        $magazine2=DB::table('store_magazine_2')->where('status', 0)->get();
        return view('store::storeMagazine2' , compact('magazine2', 'storeStock'));
    }

    public function storeFinishedGoods1(){
        $storeStock=DB::table('store_stock')->where('store_location', "Finished Goods 1")->get();
        $finishGoods1=DB::table('store_finished_goods_1')->where('status', 0)->get();
        return view('store::storeFinishedGoods1' , compact('finishGoods1', 'storeStock'));
    }

    public function storeFinishedGoods2(){
        $storeStock=DB::table('store_stock')->where('store_location', "Finished Goods 2")->get();
        $finishGoods2=DB::table('store_finished_goods_2')->where('status', 0)->get();
        return view('store::storeFinishedGoods2' , compact('finishGoods2', 'storeStock'));
    }

    public function storeComponents(){
        $storeStock=DB::table('store_stock')->where('store_location', "Components")->get();
        $components=DB::table('store_components')->where('status', 0)->get();
        return view('store::storeComponents' , compact('components', 'storeStock'));
    }

    public function totalStock(){
        $storeStock=DB::table('store_stock')->get();
        return view('store::totalStock', compact('storeStock'));
    }

    public function issueRequisition(){
        return view('store::issueRequisition/issueRequisition');
    }

    public function forwarded_to_gate_outward($id)
    {
        $status=[
            'status' => 4
        ];
        DB::table('production_component_detail')->where('id',$id)->update($status);
        return redirect()->back();
    }

    public function forwarded_to_gate_outward_mat($id)
    {
        $status=[
            'status' => 4
        ];
        DB::table('production_material_detail')->where('id',$id)->update($status);
        return redirect()->back();
    }

    public function componentRequisition(){
        $production_component_detail=DB::table('production_component_detail')->Where('status', 1)->orWhere('status', 3)->orWhere('status', 4)->orWhere('status', 5)->get();
        return view('store::issueRequisition/componentRequisition', compact('production_component_detail'));
    }

    public function materialRequisition(){
        $production_material_detail=DB::table('production_material_detail')->Where('status', 1)->orWhere('status', 3)->get();
        return view('store::issueRequisition/materialRequisition', compact('production_material_detail'));
    }

    public function proceedComponentRequisition($id, $name, $quantity){
//        dd('faizu');
        $stores=DB::table('store')->get();

        $count_store_requisition_issued=DB::table('store_requisition_issued')->select('transaction_id')->orderByDesc('id')->first();
        if(empty($count_store_requisition_issued)){
            $count_store_requisition_issued=1;
        }
        else{
            $count_store_requisition_issued=substr($count_store_requisition_issued->transaction_id,4);
            ++$count_store_requisition_issued;
        }

        return view('store::issueRequisition/proceedComponentRequisition', compact('stores', 'count_store_requisition_issued', 'id', 'name', 'quantity'));
    }

    public function proceedMaterialRequisition($id, $name, $quantity){
        $stores=DB::table('store')->get();

        $count_store_requisition_issued=DB::table('store_requisition_issued')->select('transaction_id')->orderByDesc('id')->first();
//        dd($count_store_requisition_issued);
        if(empty($count_store_requisition_issued)){
            $count_store_requisition_issued=1;
        }
        else{
            $count_store_requisition_issued=substr($count_store_requisition_issued->transaction_id,4);
            ++$count_store_requisition_issued;
        }

        return view('store::issueRequisition/proceedMaterialRequisition', compact('stores', 'count_store_requisition_issued', 'id', 'name', 'quantity'));
    }

    public function submitIssuedComponentRequisition(Request $request){
        $checkAvailableInStock=DB::table('store_stock')->where('name', $request->name)
            ->where('store_location', $request->store_location)->first();

        if (!empty($checkAvailableInStock)){
            $stockQuantity=$checkAvailableInStock->quantity;
            $requiredQuantity=$request->quantity;
//            dd($requiredQuantity);
            if ($stockQuantity > $requiredQuantity){
                $quantity=$stockQuantity-$requiredQuantity;
                $quantityStockData=[
                    'quantity' => $quantity
                ];

                $updateStock=DB::table('store_stock')->where('name', $request->name)
                    ->where('store_location', $request->store_location)->update($quantityStockData);
                if ($updateStock){
                    $data=[
                        'transaction_id' => $request->transaction_id,
                        'store_location' => $request->store_location,
                        'name' => $request->name,
                        'quantity' => $request->quantity,
                        'issued_date' => Carbon::today()
                    ];
                    $insert=DB::table('store_requisition_issued')->insert($data);

                    $changeStatusData=[
                        'status' => 3
                    ];
//                    dd($request->production_component_detail_id);
                    $updateStatus=DB::table('production_component_detail')
                        ->where('id', $request->production_component_detail_id)->update($changeStatusData);

                    if ($insert && $updateStatus){
                        return redirect('store/issueRequisition/componentRequisition')->with('message', 'Component Issued Successfully.');
                    }
                    else{
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else{
                return back()->withErrors( 'Stock quantity is less than the required Quantity.');
            }
        }
        else{
            return back()->withErrors( $request->name.' is not present in store '.$request->store_location);
        }
    }

    public function submitIssuedMaterialRequisition(Request $request){
        $checkAvailableInStock=DB::table('store_stock')->where('name', $request->name)
            ->where('store_location', $request->store_location)->first();

        if (!empty($checkAvailableInStock)){
            $stockQuantity=$checkAvailableInStock->quantity;
            $requiredQuantity=$request->quantity;
            if ($stockQuantity > $requiredQuantity){
                $quantity=$stockQuantity-$requiredQuantity;
                $quantityStockData=[
                    'quantity' => $quantity
                ];

                $updateStock=DB::table('store_stock')->where('name', $request->name)
                    ->where('store_location', $request->store_location)->update($quantityStockData);
                if ($updateStock){
                    $data=[
                        'transaction_id' => $request->transaction_id,
                        'store_location' => $request->store_location,
                        'name' => $request->name,
                        'quantity' => $request->quantity,
                        'issued_date' => Carbon::today()
                    ];
                    $insert=DB::table('store_requisition_issued')->insert($data);

                    $changeStatusData=[
                        'status' => 3
                    ];
                    $updateStatus=DB::table('production_material_detail')
                        ->where('id', $request->production_material_detail_id)->update($changeStatusData);

                    if ($insert && $updateStatus){
                        return redirect(url('store/issueRequisition/materialRequisition'))->with('message', 'Material Issued Successfully.');
                    }
                    else{
                        return back()->withErrors( 'Something went wrong.');
                    }
                }
                else{
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else{
                return back()->withErrors( 'Stock quantity is less than the required Quantity.');
            }
        }
        else{
            return back()->withErrors( $request->name.' is not present in store '.$request->store_location);
        }
    }











    public function addProduct()
    {
        return view('store::product/addProduct');
    }

    public function deliveryOrder()
    {
        return view('store::delivery/deliveryOrder');
    }

    //  -------------------- Report --------------------- //
    public function report()
    {
        return view('store::report/report');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('store::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('store::create');
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
        return view('store::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('store::edit');
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
