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
        $stores=DB::table('store')->get();
        return view('store::newBuiltyArrival', compact('stores'));
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


    public function viewBuiltyDetails($gatePassId)
    {
        if ($gatePassId!=0 || $gatePassId!=null || $gatePassId!=''){
            $inward_raw_material=DB::table('inward_raw_material')->where('gatePassId', $gatePassId)->get();

            return json_encode($inward_raw_material);
        }
        else {
            return json_encode(['error'=> 'error']);
        }
    }

    public function sendForInspection(Request $request){
        $gatepassid=$request->gatepassid;
        if ($gatepassid!=0 || $gatepassid!=null || $gatepassid!=''){
            $data=[
                'status' => 1
            ];
            $update=DB::table('inward_gate_pass')->where('gatePassId', $gatepassid)->update($data);

            if ($update){
                return redirect()->back()->with('message', 'Sent for Inspection Successfuly.');
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

//    ------------------------------ Products Came Form Production ----------------------------- //
      public function productionProduct()
      {
          $stores=DB::table('store')->get();
          $products=DB::table('production_order')
              ->join('transfer_request_store','production_order.id','transfer_request_store.order_id')
              ->where('status',4)
              ->get();

          return view('store::dashboard/product', compact('products','stores'));
      }

//    ------------------------------ ending Products Came Form Production ----------------------------- //









    public function goodsReceipt()
    {
        $stores=DB::table('store')->get();
        $suplier=DB::table('inward_gate_pass')->where('status', 0)->get();
        return view('store::product/goodsReciept', compact('stores', 'suplier'));
    }

    public function addProduct()
    {
        return view('store::product/addProduct');
    }

    public function inspection()
    {
        return view('store::product/inspection');
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
