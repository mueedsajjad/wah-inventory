<?php

namespace Modules\Supplier\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
{

    public function supplier()
    {
        $credit_term=DB::table('credit_term')->get();
        $state=DB::table('state')->get();
        $city=DB::table('city')->get();
        $payment_term=DB::table('payment_term')->get();

        $countSupplierId=DB::table('supplier')->select('supplier_id')->orderByDesc('id')->first();
        if(empty($countSupplierId)){
            $countSupplierId=1;
        }
        else{
            $countSupplierId=substr($countSupplierId->supplier_id,4);
            ++$countSupplierId;
        }
        return view('supplier::supplier', compact('countSupplierId', 'credit_term', 'payment_term', 'state', 'city'));
    }

    public function addNewSupplier(Request $request){

        $validator=request()->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'm_number' => 'required|digits:11',
            'p_number' => 'required|min:13|max:13'
        ]);
        if (!$validator){
            Input::flash();
            return back()->withErrors();
        }
        else{
            $data=[
                'supplier_id' => $request->supplier_id,
                'currency' => $request->currency,
                'name' => $request->name,
                'm_number' => $request->m_number,
                'p_number' => $request->p_number,
                'credit_term' => $request->credit_term,
                'email' => $request->email,
                'status' => $request->status,
                'gstn_number' => $request->gstn_number,
                'state' => $request->state,
                'city' => $request->city,
                'tax_excise_no' => $request->tax_excise_no,
                'vat_tin_no' => $request->vat_tin_no,
                'payment_terms' => $request->payment_terms,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'account_num' => $request->account_num,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert=DB::table('supplier')->insert($data);

            if ($insert){
                return redirect()->back()->with('message', 'Submitted Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
    }

    public function viewSuppliers(){
        $supplier=DB::table('supplier')->get();

        $credit_term=DB::table('credit_term')->get();
        $state=DB::table('state')->get();
        $city=DB::table('city')->get();
        $payment_term=DB::table('payment_term')->get();

        return view('supplier::viewSuppliers', compact('supplier', 'credit_term', 'payment_term', 'state', 'city'));
    }

    public function submitEditedSupplier(Request $request){
        $validator=request()->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'm_number' => 'required|digits:11',
            'p_number' => 'required|min:13|max:13'
        ]);
        if (!$validator){
            return back()->withErrors();
        }
        else{
            $data=[
                'supplier_id' => $request->supplier_id,
                'currency' => $request->currency,
                'name' => $request->name,
                'm_number' => $request->m_number,
                'p_number' => $request->p_number,
                'credit_term' => $request->credit_term,
                'email' => $request->email,
                'status' => $request->status,
                'gstn_number' => $request->gstn_number,
                'state' => $request->state,
                'city' => $request->city,
                'tax_excise_no' => $request->tax_excise_no,
                'vat_tin_no' => $request->vat_tin_no,
                'payment_terms' => $request->payment_terms,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'account_num' => $request->account_num,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $update=DB::table('supplier')->where('id', $request->editId)->update($data);

            if ($update){
                return redirect()->back()->with('message', 'Submitted Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
    }

    public function deleteSupplier(Request $request){
        $id=$request->deleteId;
        if($id!=0 || $id!=null || $id!=''){
            $deleteSupplier=DB::table('supplier')->where('id', $id)->delete();

            if ($deleteSupplier){
                return redirect()->back()->with('message', 'Deleted Successfuly.');
            }
            else {
                return back()->withErrors( 'Something went wrong.');
            }
        }
        else {
            return back()->withErrors( 'Something went wrong.');
        }
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('supplier::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('supplier::create');
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
        return view('supplier::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('supplier::edit');
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
