<?php

namespace Modules\Gate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class GateController extends Controller
{
    public function gate()
    {
        return view('gate::gate/gate');
    }

    public function dashboard()
    {
        return view('gate::dashboard/dashboard');
    }

    public function attendance()
    {
        return view('gate::attendance/attendance');
    }

    public function security()
    {
        return view('gate::security/security');
    }
    public function vehicle()
    {
        return view('gate::vehicle/vehicle');
    }
//  ------------------- Rports ----------------------- //
    public function report()
    {
        return view('gate::report/report');
    }

    public function inward()
    {
        return view('gate::report/inward');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('gate::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('gate::create');
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
        return view('gate::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('gate::edit');
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
