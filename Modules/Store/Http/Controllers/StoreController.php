<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
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
        $inward_gate_pass=DB::table('inward_gate_pass')->get();
        return view('store::newBuiltyArrival', compact('inward_gate_pass'));
    }


    public function viewBuiltyDetails($gatePassId){
        if ($gatePassId!=0 || $gatePassId!=null || $gatePassId!=''){
            $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gatePassId)->get();

            return json_encode($inward_raw_material);
        }
        else {
            return json_encode(['error'=> 'error']);
        }
    }

    public function changeUnloadStatus(Request $request){
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){
            $data=[
                'status' => 1
            ];
            $update=DB::table('inward_gate_pass')->where('gatePassId', $gatepassid)->update($data);

            $updateinward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)->update($data);

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

    public function approveForInspectionNote(){
        $stores=DB::table('store')->get();
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 1)
            ->orWhere('status', 2)->orWhere('status', 3)
            ->orWhere('status', 4)->orWhere('status', 5)->get();
        return view('store::approveForInspectionNote', compact('stores', 'inward_raw_material'));
    }

    public function submitAssignedStore(Request $request,$gatePassId){
        if ($gatePassId!=0 || $gatePassId!=null || $gatePassId!=''){
            $data=[
                'storeLocation' => $request->storeLocation
            ];
            $update=DB::table('inward_raw_material')->where('gatePassId', $gatePassId)
                ->where('materialName', $request->materialName)->update($data);

            if ($update){
                return redirect()->back()->with('message', 'Updated Store Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function sendForInspection(Request $request){
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){

            $checkStore=DB::table('inward_raw_material')->where('gatePassId', $gatepassid)
                ->where('materialName', $request->materialname)->first();
            $checkStore=$checkStore->storeLocation;

            if ($checkStore){
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
            }
            else {
                return back()->withErrors( 'Kindly, First assign a store.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function inwardInspectionNote()
    {
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 2)
            ->orWhere('status', 3)->orWhere('status', 4)
            ->orWhere('status', 5)->get();

        return view('store::inwardInspectionNote', compact( 'inward_raw_material'));
    }

    public function submitInwardInspectionNote(Request $request){
        $submitId=$request->submitId;
        if ($submitId!=0 || $submitId!=null || $submitId!='') {
            $data=[
                'inspectionDate' => date('Y-m-d'),
                'inspectionStatus' => $request->inspectionStatus,
                'rejectionReason' => $request->rejectionReason,
                'rejectedQty' => $request->rejectedQty
            ];

            $update=DB::table('inward_raw_material')->where('id', $submitId)->update($data);

            if ($update){
                return redirect()->back()->with('message', 'Updated Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function sendForInwardReceipt(Request $request){
        $sendId=$request->sendId;
        if ($sendId!=0 || $sendId!=null || $sendId!=''){

            $checkStore=DB::table('inward_raw_material')->where('id', $sendId)->first();
            $checkInspection=$checkStore->inspectionDate;

            if ($checkInspection){
                $data=[
                    'status' => 3
                ];
                $update=DB::table('inward_raw_material')->where('id', $sendId)->update($data);

                if ($update){
                    return redirect()->back()->with('message', 'Sent for Recepit Successfuly.');
                }
                else {
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else {
                return back()->withErrors( 'Kindly, First Add a Note.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function inwardGoodsReceipt()
    {
        $inward_raw_material=DB::table('inward_raw_material')->where('status', 3)
            ->orWhere('status', 4)->orWhere('status', 5)->get();
        return view('store::inwardGoodsReceipt', compact('inward_raw_material'));
    }

    public function writeInwardGoodsReceipt($id, $gatePassId)
    {
        if ($id!=null || $id!=0 || $id!=''){

            $countInwardGoodsReceipt=DB::table('inward_goods_receipt')->select('grn')->orderByDesc('id')->first();
            if(empty($countInwardGoodsReceipt)){
                $countInwardGoodsReceipt=1;
            }
            else{
                $countInwardGoodsReceipt=substr($countInwardGoodsReceipt->grn,5);
                ++$countInwardGoodsReceipt;
            }

            $inward_raw_material=DB::table('inward_raw_material')->where('id', $id)->first();
            $inward_gate_pass=DB::table('inward_gate_pass')->where('gatePassId', $gatePassId)->first();
            return view('store::writeInwardGoodsReceipt', compact('inward_raw_material', 'inward_gate_pass', 'countInwardGoodsReceipt'));
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function submitInwardGoodsReceipt(Request $request){
        //dd($request);
        if($request->hasFile('document')) {
            $validator=request()->validate([
                'document' => 'file|mimes:pdf',
            ]);

            if (!$validator){
                return back()->withErrors();
            }

            $file = $request->file('document');
            $name=$file->getClientOriginalName();
            $path=public_path('upload');
            $file->move($path, $name);
            $document = $name;
        }
        else{
            $document=null;
        }

        $data=[
            'grn' => $request->grn,
            'grnDate' => date('Y-m-d'),
            'document' => $document,
            'purchasedFrom' => $request->purchasedFrom,
            'gatePassId' => $request->gatePassId,
            'totalCost' => $request->totalCost,
            'name' => $request->name,
            'purchaseOrderNo' => $request->purchaseOrderNo,
            'materialName' => $request->materialName,
            'uom' => $request->uom,
            'description' => $request->description,
            'totalQuantity' => $request->totalQuantity,
        ];
        $insert=DB::table('inward_goods_receipt')->insert($data);

        $data=[
            'status' => 4
        ];
        $update=DB::table('inward_raw_material')->where('id', $request->inward_raw_material_id)->update($data);

        if ($insert && $update){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }

    public function changeInwardReceiptApprovalStatus(Request $request){
        $id=$request->sendId;
        if ($id!=0 || $id!=null || $id!=''){
            $checkMakeReceiptStatus=DB::table('inward_raw_material')->where('id', $id)->first();
            $checkMakeReceiptStatus=$checkMakeReceiptStatus->status;

            if ($checkMakeReceiptStatus==4){
                $data=[
                    'status' => 5
                ];
                $update=DB::table('inward_raw_material')->where('id', $id)->update($data);

                if ($update){
                    return redirect()->back()->with('message', 'Submitted Successfuly.');
                }
                else {
                    return back()->withErrors( 'Something went wrong.');
                }
            }
            else {
                return back()->withErrors( 'Kindly first make the Receipt.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }











    public function storewiseNewBuiltyArrival($storeLocation){
        if ($storeLocation!=null && $storeLocation!=0){
            $stores=DB::table('store')->get();
            $storeName=DB::table('store')->where('id', $storeLocation)->first();
            $inward_gate_pass=DB::table('inward_gate_pass')->where('status', 0)
                ->where('storeLocation', $storeLocation)->get();
            return view('store::storewiseNewBuiltyArrival', compact('stores', 'inward_gate_pass', 'storeName'));
        }
        else {
            return back()->withErrors( 'Something went wrong.');
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

    public function IssueRequisition()
    {
        return view('store::IssueRequisition/IssueRequisition');
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
