<?php

namespace Modules\Gate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GateController extends Controller
{
    public function addInwardGatePass(Request $request){
        //dd($request);
        $data=[
            'gatePassId' => $request->gatePassId,
            'transporter' => $request->transporter,
            'type' => $request->type,
            'name' => $request->name,
            'vehicalNo' => $request->vehicalNo,
            'driver' => $request->driver,
            'driverPh' => $request->driverPh,
            'date' => date('Y-m-d'),
            'status' => 0
        ];
        $insertInwardGatePass=DB::table('inward_gate_pass')->insert($data);

        for($i=0 ; $i<$request->countMaterial ; $i++){
            $data=[
                'materialName' => $request['materialName'][$i],
                'uom' => $request['uom'][$i],
                'qty' => $request['qty'][$i],
                'description' => $request['description'][$i],
                'gatePassId' => $request->gatePassId,
                'date' => date('Y-m-d'),
                'status' => 0
            ];
            $insertInwardRawMaterial=DB::table('inward_raw_material')->insert($data);
        }

        if ($insertInwardGatePass && $insertInwardRawMaterial){
            return redirect()->back()->with('message', 'Submitted Successfuly.');
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }

    }



    public function inwardGatePass()
    {
        $supplier=DB::table('supplier')->get();
        $units=DB::table('unit')->get();
        $stores=DB::table('store')->get();
        $countInwardGatePass=DB::table('inward_gate_pass')->select('gatePassId')->orderByDesc('id')->first();

        if(empty($countInwardGatePass)){
            $countInwardGatePass=1;
        }
        else{
            $countInwardGatePass=substr($countInwardGatePass->gatePassId,4);
            ++$countInwardGatePass;
        }
        return view('gate::gate/inwardGatePass', compact('countInwardGatePass', 'supplier', 'stores', 'units'));
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
