<?php

namespace Modules\Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StoreController extends Controller
{
    public function dashboard()
    {
        return view('store::dashboard/dashboard');
    }
//  -------------------- Materil --------------------- //
    public function rawMaterial()
    {
        return view('store::material/rawMaterial');
    }
    public function addMaterial()
    {
        return view('store::material/addMaterial');
    }

//  -------------------- ./ Ending Material --------------------- //


//  -------------------- Product --------------------- //
    public function product()
    {
        return view('store::product/product');
    }
    public function addProduct()
    {
        return view('store::product/addProduct');
    }

    public function goodsReceipt()
    {
        return view('store::product/goodsReciept');
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
