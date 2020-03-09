<?php

namespace Modules\GMSGA\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class GMSGAController extends Controller
{

    public function production()
    {
        return view('gmsga::production/production');
    }
    public function materialRequest()
    {
        return view('gmsga::Material/materialRequest');
    }
// -------------------- Gate ----------------------- //
    public function gate()
    {
        return view('gmsga::gate/gate');
    }

    public function gatePassInward()
    {
        return view('gmsga::gate/gatePass');
    }

    public function attendance()
    {
        return view('gmsga::gate/attandence');
    }

    public function security()
    {
        return view('gmsga::gate/security');
    }
    public function vehicleManagement()
    {
        return view('gmsga::gate/vehicleManagement');
    }

// -------------------- Store ------------------------------- //


    public function storeIndex()
    {
        return view('gmsga::store/store');
    }
    public function rawMaterial()
    {
        return view('gmsga::store/rawMaterial');
    }
    public function product()
    {
        return view('gmsga::store/product');
    }






    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('gmsga::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('gmsga::create');
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
        return view('gmsga::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('gmsga::edit');
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
