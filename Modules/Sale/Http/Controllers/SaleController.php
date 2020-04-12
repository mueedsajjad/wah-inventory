<?php

namespace Modules\Sale\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sale()
    {
        $count=DB::table('sale_order')->orderByDesc('id')->first();
        if(empty($count)){
            $countSoNumber=1;
        }
        else{
            $countSoNumber=substr($count->so_number,4);
            ++$countSoNumber;
        }

        $units=DB::table('unit')->get();
        $products=DB::table('setting_product')->get();
        $customers=DB::table('customers')->get();

        return view('sale::sale/sale', compact('countSoNumber','units', 'products', 'customers'));
    }

    public function saleStore(Request $request)
    {
        if($request->delivery_date >= Carbon::today()){

            $sale_order=DB::table('sale_order')->insert([
                'so_number' => $request->so_number,
                'date' => Carbon::today(),
                'delivery_date' => $request->delivery_date,
                'customer_id' => $request->customer_id,
                'status' => 0
            ]);

            for ($i=0 ; $i<$request->countProduct; $i++){
                $sale_order_products=DB::table('sale_order_products')->insert([
                    'so_number' => $request['so_number'],
                    'product_code' =>$request['productCode'][$i],
                    'uom' =>$request['uom'][$i],
                    'qty' =>$request['qty'][$i],
                    'description' =>$request['description'][$i]
                ]);
            }

            if($sale_order && $sale_order_products){
                return redirect()->back()->with('message', 'Saved Successfully');
            }
            else{
                return redirect()->back()->withErrors('Something went wrong.');
            }
        }
        else{
            return redirect()->back()->withErrors('Delivery Date is wrong.');
        }
    }

    public function saleOrder()
    {
        $orders=DB::table('sale_order')->select('sale_order.*', 'customers.*')
            ->join('customers', 'sale_order.customer_id','=', 'customers.customer_id')
            ->where('sale_order.status', 0)
            ->orWhere('sale_order.status', 1)->get();
       //dd($orders);
        return view('sale::sale/saleOrder',compact('orders'));
    }

    public function getSaleOrderProducts(Request $request){
        $sale_order_products=DB::table('sale_order_products')
            ->join('setting_product', 'sale_order_products.product_code', '=', 'setting_product.product_code')
            ->where('sale_order_products.so_number', $request->so_number)->get();

        if ($sale_order_products){
            return json_encode($sale_order_products);
        }
        else{
            return json_encode('error');
        }
    }

    public function changeApprovalStatus(Request $request){
        $id=$request->id;
        if ($id!=0 || $id!='' || $id!=null){
            $sale_order=DB::table('sale_order')->where('id', $id)->update(['status' => 1]);

            if ($sale_order){
                return redirect()->back()->with('message', 'Status Changed Successfully.');
            }
            else{
                return redirect()->back()->withErrors('Something went wrong.');
            }
        }
        else{
            return redirect()->back()->withErrors('Something went wrong.');
        }
    }

    public function searchSaleOrderByDate(Request $request){
        $from=$request->from_date;
        $to=$request->to_date;

        if ($from < $to){
            $subquery=DB::table('sale_order')->select('sale_order.*', 'customers.*')
                ->join('customers', 'sale_order.customer_id','=', 'customers.customer_id')
                ->where('sale_order.status', 0)
                ->orWhere('sale_order.status', 1);
            $orders=$subquery->whereBetween('sale_order.date' ,[$from, $to])
                ->get();
            //dd($orders);

            if ($orders){
                return view('sale::sale/saleOrder',compact('orders'));
            }
            else{
                return redirect()->back()->withErrors('Something went wrong.');
            }
        }
        else{
            return redirect()->back()->withErrors('To Date cannot be less than From Date.');
        }
    }

    public function dashboard(){
        return view('sale::dashboard/dashboard');
    }

    public function newOrders(){
        return view('sale::dashboard/newOrders');
    }

    public function deliveryOrders(){
        return view('sale::dashboard/deliveryOrders');
    }

    public function ordersDelivered(){
        return view('sale::dashboard/ordersDelivered');
    }

    public function customer(){
        $credit_term=DB::table('credit_term')->get();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $payment_term=DB::table('payment_term')->get();

        $count=DB::table('customers')->orderByDesc('id')->first();
        if(empty($count)){
            $countCustomerId=1;
        }
        else{
            $countCustomerId=substr($count->customer_id,4);
            ++$countCustomerId;
        }

        return view('sale::customer/customer', compact('credit_term', 'city', 'state', 'payment_term', 'countCustomerId'));
    }

    public function addCustomer(Request $request){
        $data=[
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'm_number' => $request->m_number,
            'p_number' => $request->p_number,
            'credit_term' => $request->credit_term,
            'email_id' => $request->email_id,
            'customer_status' => $request->customer_status,
            'gstn_number' => $request->gstn_number,
            'state' => $request->state,
            'city' => $request->city,
            'tax_reference_no' => $request->tax_reference_no,
            'vat_number' => $request->vat_number,
            'payment_terms' => $request->payment_terms,
            'registration_date' => Carbon::today()
        ];
        $insert=DB::table('customers')->insert($data);

        if ($insert){
            return redirect()->back()->with('message', 'Customer Registered Successfully.');
        }
        else{
            return redirect()->back()->withErrors('Something went wrong.');
        }
    }












    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('sale::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('sale::create');
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
        return view('sale::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('sale::edit');
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
