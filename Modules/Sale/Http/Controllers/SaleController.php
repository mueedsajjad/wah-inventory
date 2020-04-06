<?php

namespace Modules\Sale\Http\Controllers;

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
        return view('sale::sale/sale');
    }

    public function saleStore(Request $request)
    {
        $data= $request->validate([
            'so_number' => 'required',
            'date' => 'required|date',
            'name' => 'required',
            'product_number' => 'required',
            'quantity' => 'required',
            ]);

            DB::table('sale_order')->insert([
                'so_number' => $data['so_number'],
                'date' => $data['date'],
                'name' => $data['name'],
                'product_number' => $data['product_number'],
                'quantity' => $data['quantity'],
                ]);

            return redirect()->back()->with('save', 'Saved Successfully');
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
