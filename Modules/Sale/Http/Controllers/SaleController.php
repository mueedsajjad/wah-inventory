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
        //dd($request);

            $sale_order=DB::table('sale_order')->insert([
                'so_number' => $request->so_number,
                'date' => Carbon::today(),
                ]);

            for ($i=0 ; $i<$request->countProduct; $i++){
                $sale_order_products=DB::table('sale_order_products')->insert([
                    'so_number' => $request['so_number'][$i],
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

    public function saleOrder()
    {
        $orders=DB::table('sale_order')
        ->join('setting_product','sale_order.product_number','=','setting_product.product_code')
        ->get();
       // dd($orders);
        return view('sale::sale/saleOrder',compact('orders'));
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
