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

        return view('sale::sale/sale', compact('countSoNumber','units', 'products'));
    }

    public function saleStore(Request $request)
    {
//        dd($request->delivery_date);
        if ($request->delivery_date >= Carbon::today()){
            $sale_order=DB::table('sale_order')->insert([
                'so_number' => $request->so_number,
                'date' => Carbon::today(),
                'delivery_date' => $request->delivery_date,
                'customer_name' => $request->customer_name,
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
        $orders=DB::table('sale_order')->where('status', 0)
            ->orWhere('status', 1)->get();
       // dd($orders);
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







    public function customer()
    {
        return view('sale::customer/customer');
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
