<?php

namespace Modules\AssistantManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AssistantManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $records = DB::table('purchase_requisitions')->get();



        return view('assistantmanager::dashboard', compact('records'));
    }


    public function requDash(){
        return view('assistantmanager::requDash');
    }

    public function requMaterialDash(){

        $m_requ = DB::table('production_material')->get();

        return view('assistantmanager::requMaterialDash', compact('m_requ'));
    }

    public function requComponentDash(){

        $c_requ = DB::table('production_component')->get();

        return view('assistantmanager::requComponentDash', compact('c_requ'));
    }


    public function requMaterialDetail($data){

        $details = DB::table('production_material_detail')->where('production_material_id', $data)->get();
        $record = DB::table('production_material')->find($data);

        return view('assistantmanager::getMaterialDetails', compact('details', 'record'));

    }

    public function requComponentDetail($data){

        $details = DB::table('production_component_detail')->where('production_component_id', $data)->get();
        $record = DB::table('production_component')->find($data);

        return view('assistantmanager::getComponentDetails', compact('details', 'record'));

    }
    public function requMaterialAction($condition, $id){
        if ($condition == 'accept'){
            DB::table('production_material_detail')->where('id', $id)->update(['status' => 1]);
        }else{
            DB::table('production_material_detail')->where('id', $id)->update(['status' => 2]);
        }
        return redirect()->back()->with('message', 'Action Perform Successfully');
    }

    public function requComponentAction($condition, $id){
        if ($condition == 'accept'){
            DB::table('production_component_detail')->where('id', $id)->update(['status' => 1]);
        }else{
            DB::table('production_component_detail')->where('id', $id)->update(['status' => 2]);
        }
        return redirect()->back()->with('message', 'Action Perform Successfully');
    }



    public function requisitionRequest(){
        $units = DB::table('unit')->get();
        $components = DB::table('component')->get();
        return view('assistantmanager::requisitionRequest', compact('units', 'components'));

    }

    public function requisitionRequestSubmit(Request $request){
        $issue_date = $request->issue_date;

        $requisition_id = 'PR-'.random_int(999, 9999);



        DB::table('purchase_requisitions')->insert([
            'requisition_id' => $requisition_id,
            'issue_date' => $issue_date,
        ]);

        $latest = DB::table('purchase_requisitions')->orderByDesc('id')->first();



        $size = sizeof($request->materialName);

        for ($i = 0; $i < $size; $i++) {
            $answers[] = [
                'req_id' => $latest->id,
                'requisition_id' => $latest->requisition_id,
                'material_name' => $request->materialName[$i],
                'uom' => $request->uom[$i],
                'description' => $request->description[$i],
                'quantity' => $request->qty[$i],
            ];
        }
        DB::table('purchase_requisitions_detail')->insert($answers);


        return redirect()->back()->with('message', 'Requisition Request Submitted Successfully');
    }


        public function getDetails($id){

            $details = DB::table('purchase_requisitions_detail')->where('req_id', $id)->get();

            $record = DB::table('purchase_requisitions')->find($id);

//            dd($record);
            return view('assistantmanager::getDetails',compact('details', 'record'));
        }


    public function create()
    {
        return view('assistantmanager::create');
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
        return view('assistantmanager::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('assistantmanager::edit');
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
