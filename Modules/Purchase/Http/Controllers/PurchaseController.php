<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function purchase()
    {
        $credit=DB::table('credit_term')->get();
        return view('purchase::purchase/purchase',compact('credit'));
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
        //dd($order);

        return view('purchase::purchase/orderDetail',compact('order'));
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
        return view('purchase::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

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
