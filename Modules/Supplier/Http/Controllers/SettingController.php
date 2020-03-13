<?php

namespace Modules\Supplier\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
//    public function setting()
//    {
//        $credit=DB::table('credit_term')->get();
//        $state=DB::table('state')->get();
//
//        $city = DB::table('city')
//            ->join('state', 'state.id', '=', 'city.state_id')
//            ->select('state.name as state_name','city.id','city.name')
//            ->get();
//
//        $payment=DB::table('payment_term')->get();
//        return view('supplier::setting/setting',compact('credit','state','city','payment'));
//    }
//
////    ------------------------------ Credit Terms -------------------------------- //
//
//    public function creditStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//
//        $count=DB::table('credit_term')->where('name',$data['name'])->count();
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//            {
//            DB::table('credit_term')->insert(['name' => $data['name']]);
//            return redirect()->back()->with('save', 'Saved Successfully');
//           }
//    }
//
//    public function creditDelete($id)
//    {
//
//        if($id)
//        {
//            DB::table('credit_term')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//
//    //    ------------------------------ State -------------------------------- //
//
//    public function stateStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//
//        $count=DB::table('state')->where('name',$data['name'])->count();
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('state')->insert(['name' => $data['name']]);
//            return redirect()->back()->with('save', 'Saved Successfully');
//        }
//    }
//
//    public function stateDelete($id)
//    {
//        //dd($id);
//        if($id)
//        {
//            DB::table('state')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//    //    ------------------------------ City -------------------------------- //
//
//    public function cityStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string','state_id'=>'required']);
//
//        $count=DB::table('city')->where('name',$data['name'])->count();
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('city')->insert(['name' => $data['name'],'state_id'=>$data['state_id']]);
//            return redirect()->back()->with('save', 'Saved Successfully');
//        }
//    }
//
//    public function cityDelete($id)
//    {
//        if($id)
//        {
//            DB::table('city')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//    //   ------------------------------ Payment Terms -------------------------------- //
//
//    public function paymentStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//
//        $count=DB::table('payment_term')->where('name',$data['name'])->count();
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('payment_term')->insert(['name' => $data['name']]);
//            return redirect()->back()->with('save', 'Saved Successfully');
//        }
//    }
//
//    public function paymentDelete($id)
//    {
//        if($id)
//        {
//            DB::table('payment_term')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }


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
