<?php

namespace Modules\Purchase\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use vendor\project\StatusTest;

class PurchaseController extends Controller
{
    public function purchase()
    {
        $credit=DB::table('credit_term')->get();
        return view('purchase::purchase/purchase',compact('credit'));
    }

    public function createTender($id){
        $purchase_requ = DB::table('purchase_requisitions')->get();
        $record = DB::table('purchase_order_approval')->find($id);

        $details = DB::table('purchase_order_approval_detail')->where('po_id', $record->id)->where('status', 0)->get();


        $vendor = DB::table('supplier')->get();
        $credit=DB::table('credit_term')->get();
        return view('purchase::dashboard',compact('credit','details', 'purchase_requ', 'record', 'vendor'));

    }


    public function viewTender(){

        $zeroo=[];
        $onee =[];

        $record = DB::table('purchase_order_approval')->where(['status'=>4])->get();

        return view('purchase::viewTender',compact( 'record'));
    }


    public function dashboard()
    {


        $purchase_requ = DB::table('purchase_requisitions')->get();
        $credit=DB::table('credit_term')->get();
        return view('purchase::dashboard',compact('credit', 'purchase_requ'));
    }



    public function createVendor(){
        return view('purchase::createVendor');

    }

    public function getRequ($id){

        $requ_req = DB::table('purchase_order_approval')->find($id);
        $details = DB::table('purchase_order_approval_detail')->where('po_id', $requ_req->id)->where('status', 0)->get();

        return view('purchase::getRequ', compact('details', 'requ_req'));
    }



    public function tenderOrder(Request $request){

        if ($request->vendor == null && $request->check == null){
            return redirect()->back()->with('error', 'Something is missing in this form');
        }


        $record = DB::table('purchase_order_approval')->find($request->po_id);

        $po_id = 'PO-'.random_int(999,9999);

        DB::table('purchase_order_approval')->insert([
            'purchase_type' => $record->purchase_type,
            'issue_date' => Carbon::now()->toDateString(),
            'requisition_id' => $record->requisition_id,
            'purchase_order_id' => $po_id,
            'vendor_id' => $request->vendor,
            'status' => 1,
        ]);


        foreach ($request->check as $dataa){
           DB::table('purchase_order_approval_detail')->where('id', $dataa)->update(['status' => 1]);

           $detail[] = DB::table('purchase_order_approval_detail')->find($dataa);
        }

        $latest = DB::table('purchase_order_approval')->orderByDesc('id')->first();

        foreach ($detail as $data){

            DB::table('purchase_order_approval_detail')->insert([
                'po_id' => $latest->id,
                'purchase_order_id' => $po_id,
                'material_name' => $data->material_name,
                'uom' => $data->uom,
                'description' => $data->description,
                'quantity'=>$data->quantity,
                'unit_price'=>$data->unit_price,
                'total_price' => $data->total_price,
            ]);
        }


            DB::table('ppra_order')->insert([
                'po_id'  =>  $latest->id,
                'requisition_id' => $latest->requisition_id,
                'purchase_order_id' => $latest->purchase_order_id,
                'commercial_offer' => $request->c_offer,
                'technical_offer' => $request->t_offer,
                'vendor_id' => $latest->vendor_id,
            ]);

        return redirect(url('/tender/view-tender/'))->with('message', 'Tender create successfully');



    }

    public function purchaseOrderApproval(Request $request){

//
//        dd($request->all());

        if ($request->hasFile('upload'))
        {
            $image = $request->file('upload');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $name);
        }
        else
        {
            $name=null;
        }

        $requisition_id = DB::table('purchase_requisitions')->find($request->requisition_id);

        DB::table('purchase_requisitions')->where('id',$request->requisition_id)->update(['status' => 1]);

        $issue_date = $request->issue_date;

        $purchase_order_id = 'PO-'.random_int(4, 9999);



        DB::table('purchase_order_approval')->insert([
            'purchase_order_id' => $purchase_order_id,
            'requisition_id' => $requisition_id->requisition_id,
            'upload' => $name,
            'issue_date' => $issue_date,
            'purchase_type' => $request->purchase_type,
        ]);

        $latest = DB::table('purchase_order_approval')->orderByDesc('id')->first();


        $size = sizeof($request->material_name);

        for ($i = 0; $i < $size; $i++) {
            $answers[] = [
                'po_id' => $latest->id,
                'purchase_order_id' => $latest->purchase_order_id,
                'material_name' => $request->material_name[$i],
                'uom' => $request->uom[$i],
                'description' => $request->description[$i],
                'quantity' => $request->qty[$i],
                'unit_price' => $request->unitprice[$i],
                'total_price' => $request->totalprice[$i],
            ];
        }
        DB::table('purchase_order_approval_detail')->insert($answers);



        return redirect(url('/purchase/'))->with('message', 'Purchase Order Request Submitted Successfully');


    }


    public function purchaseStore(Request $request)
    {
        $data= $request->validate([
            'po_number' => 'required|string',
            'date'=>'required|date',
            'credit_term' => 'required|integer',
        ]);


        if ($request->hasFile('upload'))
        {
            $image = $request->file('upload');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('upload');
            // dd($name);
            $image->move($destinationPath, $name);
        }
        else
        {
            $name=null;
        }

        $user_id= Auth::id();
       // dd($user_id);

        DB::table('purchase_order')->insert(['po_number'=>$data['po_number'],'po_date'=>$data['date'],'credit_term'=>$data['credit_term'],'upload'=> $name,'user_id'=>$user_id,'status'=>0]);

        $last_id= DB::table('purchase_order')->orderBy('id', 'desc')->first();


        $purchase_id=$last_id->id;

        //dd($purchase_id);
        //dd($request->p_name0);
        $count=$request->countConditions;
        //dd($request->p_number1);

        for($i=0;$i<=$count;$i++)
        {
              $po_number="p_number".$i;
              $p_name="p_name".$i;
              $p_d="p_description".$i;
              $quantity="p_quantity".$i;
              $unit_price="p_price".$i;
              $total_price="p_total_price".$i;

            $data=[
                'purchase_id'=>$purchase_id,
                'po_number'=>$request->$po_number,
                'p_name'=>$request->$p_name,
                'p_d'=>$request->$p_d,
                'unit_id'=>1,
                'quantity'=>$request->$quantity,
                'unit_price'=>$request->$unit_price,
                'total_price'=>$request->$total_price,
            ];

            $insert=DB::table('purchase_order_item')->insert($data);
        }

        return redirect()->back()->with('save','Purchased Ordered Successfully');

    }

//    ----------------------- Order For Approve ------------------------------- //
    public function orderForApprove()
    {
        $orderForApprove=DB::table('purchase_order')
        ->join('users','users.id','=','purchase_order.user_id')
        ->join('credit_term','credit_term.id','=','purchase_order.credit_term')
        ->select('purchase_order.*','credit_term.*','users.name as UserName','purchase_order.id as order_id')
        ->get();
        //dd($orderForApprove);

        return view('purchase::purchase/orderForApprove',compact('orderForApprove'));
    }

    public function Order_purchase_detail($id)
    {
        $order=DB::table('purchase_order')
            ->join('purchase_order_item','purchase_order_item.purchase_id','=','purchase_order.id')
            ->where('purchase_order_item.purchase_id','=',$id)
            ->select('purchase_order.*','purchase_order_item.*')
            ->get();
        return view('purchase::purchase/orderDetail',compact('order'));
    }


    public function orderTable(){
        $orders = DB::table('purchase_order_approval')->get();
        return view('purchase::orderTable',compact('orders'));
    }

    public function getDetail($id){
        $details = DB::table('purchase_order_approval_detail')->where('po_id', $id)->get();

        $record = DB::table('purchase_order_approval')->find($id);

//        dd($record);
        return view('purchase::getDetails',compact('details', 'record'));
    }

    public function getDetailTender($id){

        $detailsOne = DB::table('purchase_order_approval_detail')->where(['po_id'=>$id, 'status'=>1])->get();
        $detailsZero = DB::table('purchase_order_approval_detail')->where(['po_id'=>$id, 'status'=>0])->get();


//        dd($detailsZero);
        $record = DB::table('purchase_order_approval')->find($id);

        return view('purchase::getDetailsforTender',compact('detailsOne', 'detailsZero','record'));
    }


    public function purchaseOrderlist(){

        $orders = DB::table('purchase_order_approval')->get();

        return view('purchase::orderTableForPurchase',compact('orders'));

    }

    public function orderApprove($id)
    {

     DB::table('purchase_order_approval')->where('id',$id)->where('purchase_type', 'ppra')->update(['status'=>4]);
     DB::table('purchase_order_approval')->where('id',$id)->where('purchase_type', 'direct-purchase')->update(['status'=>1]);

        $data = DB::table('purchase_order_approval')->find($id);

        DB::table('purchase_requisitions')->where('requisition_id', $data->requisition_id)->update(['status'=>2]);

        return redirect()->back()->with('save','Order is Accepted');
    }

    public function orderReject($id)
    {
        DB::table('purchase_order_approval')->where('id',$id)->update(['status'=>2]);


        $data = DB::table('purchase_order_approval')->find($id);

        DB::table('purchase_requisitions')->where('requisition_id', $data->requisition_id)->update(['status'=>3]);

        return redirect()->back()->with('save','Order is Rejected');
    }

    public function makeOrder($data, $id){

        $record = DB::table('purchase_order_approval')->find($id);
        $vendor = DB::table('supplier')->get();

        $details = DB::table('purchase_order_approval_detail')->where('po_id', $record->id)->get();

        if ($data == 'ppra'){
            $record = DB::table('purchase_order_approval')->find($id);
            $vendor = DB::table('supplier')->find($record->vendor_id);

            $ppra = DB::table('ppra_order')->where('po_id', $record->id)->first();
            $details = DB::table('purchase_order_approval_detail')->where('po_id', $record->id)->get();

            return view('purchase::ppraOrder',compact('record', 'details', 'vendor', 'ppra'));
        }
        else
            {
            return view('purchase::directPurchaseOrder',compact('record', 'details', 'vendor'));
        }

    }



        public function getVendor($id){

        $vendor  = DB::table('supplier')->find($id);
        return view('purchase::getVendor',compact('vendor'));

        }

        public function sendOrder(Request $request){

        if ($request->vendor == null){
            return redirect()->back()->with('error', 'select vendor then submit the form');
        }elseif($request->vendor == 'direct'){
            DB::table('purchase_order_approval')->where('id', $request->id)->update([
                'status' => 3,
                'vendor' => null,
            ]);
        }else{
            DB::table('purchase_order_approval')->where('id', $request->id)->update([
                'vendor_id' => $request->vendor,
                'status' => 3,
            ]);
        }

            return redirect(url('purchase/new-purchase-list'))->with('save', 'Successfully Submitted');

        }


        public function ppraOrder(Request $request){


            DB::table('purchase_order_approval')->where('id', $request->id)->update([
                'status' => 3,
            ]);


            return redirect(url('purchase/new-purchase-list'))->with('save', 'Successfully Submitted');

        }





    public function accept($id)
    {
        DB::table('purchase_order')->where('id',$id)->update(['status'=>1]);
        return redirect()->back()->with('save','Order is Accepted');
    }

    public function reject($id)
    {
        DB::table('purchase_order')->where('id',$id)->update(['status'=>2]);
        return redirect()->back()->with('reject','Order is Rejected');
    }

    public function selectSupplier()
    {
        $order=DB::table('purchase_order')->where('status',1)->get();
        return view('purchase::supplier/selectSupplier',compact('order'));
    }



    public function storeSupplier(Request $request)
    {
        $data= $request->validate([
            'po_number' => 'required|string',
            'supplier_name'=>'required|string',
            'supplier_id' => 'required|integer',
        ]);
        $check=DB::table('purchase_order')->where('po_number',$data['po_number'])
            ->update(['supplier_name'=>$data['supplier_name'],'supplier_id'=>$data['supplier_id'],'status'=>3]);

        return redirect()->back()->with('save','Supplier is Selected For Purchase');
    }


    public function purchaseOrder()
    {
        return view('purchase::purchase/purchaseOrder');
    }
    public function directReceipt()
    {
        return view('purchase::purchase/directReceipt');
    }

    public function tender()
    {

        return view('purchase::purchase/tender');
    }





// image code //

//if ($req->hasFile('upload')) {
//$image = $req->file('upload');
//$name = time() . '.' . $image->getClientOriginalName();
//$destinationPath = public_path('upload');
//$image->move($destinationPath, $name);
//}
//else
//{
//    $name=null;
//}
//DB::table('more_info')->update([
//    'user_id'=>$req->user_id,
//    'driving_liec'=>$req->license,
//    'other_id'=>$req->oid,
//    'dob'=>$req->dob,
//    'gender'=>$req->gender,
//    'national'=>$req->national,
//    'material_status'=>$req->material,
//    'joining'  =>$req->join,
//    'address_line'=>$req->line,
//    'address_lines' =>$req->lines,
//    'city' =>$req->city,
//    'country' =>$req->country,
//    'zip_code' =>$req->zip,
//    'home_phone' =>$req->home,
//    'work_phone' =>$req->work,
//    'email' =>$req->email,
//    'nic' =>$req->nic,
//    'profile_image'=>$name,
//]);
//
//
//return redirect()->back()->with('update','done');
//
//error_reporting(0);


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $records = DB::table('purchase_requisitions')->get();




        return view('purchase::index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function purchaseNewRequest($id){

        $records = DB::table('purchase_requisitions')->find($id);

        $details = DB::table('purchase_requisitions_detail')->where('req_id', $records->id)->get();


        return view('purchase::purchaseNewRequest', compact('records', 'details'));

    }

    public function create()
    {
        return view('purchase::create');
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
        return view('purchase::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('purchase::edit');
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
