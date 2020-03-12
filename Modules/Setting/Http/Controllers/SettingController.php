<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function setting()
    {
        $units=DB::table('unit')->get();
        $categories=DB::table('category')->get();
        $stores=DB::table('store')->get();
        $operations=DB::table('operation')->get();
        $departments=DB::table('departments')->get();

        return view('setting::setting/setting',compact('units','categories','stores','operations','departments'));
    }

//   ----------------------- Unit  ---------------------------------- //
    public function unitStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);
        $count=DB::table('unit')->where('name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else {
            DB::table('unit')->insert(['name' => $data['name']]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function unitDelete($id)
    {
        if($id)
        {
            DB::table('unit')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

// -------------------------  Category ---------------------------------- //

    public function categoryStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);
        $count=DB::table('category')->where('name',$data['name'])->count();

        if($count > 0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('category')->insert(['name'=> $data['name'] ]);
            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function categoryDelete($id)
    {
        if($id)
        {
            DB::table('category')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

    // -------------------------  Store ---------------------------------- //

    public function storeStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);
        $count=DB::table('store')->where('name',$data['name'])->count();

        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('store')->insert(['name'=> $data['name'] ]);
            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function storeDelete($id)
    {
        if($id)
        {
            DB::table('store')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

    // -------------------------  Operation ---------------------------------- //

    public function operationStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);
        $count=DB::table('operation')->where('name',$data['name'])->count();

        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('operation')->insert(['name'=> $data['name'] ]);
            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function operationDelete($id)
    {
        if($id)
        {
            DB::table('operation')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

    // -------------------------  Department ---------------------------------- //
    public function departmentStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);
        $count=DB::table('departments')->where('name',$data['name'])->count();

        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('departments')->insert(['name'=> $data['name'] ]);
            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function departmentDelete($id)
    {
        if($id)
        {
            DB::table('departments')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }


    // ---------------------- General Setting ------------------------------- //

    public function settingGeneral()
    {
        $credit=DB::table('credit_term')->get();
        $state=DB::table('state')->get();

        $city = DB::table('city')
            ->join('state', 'state.id', '=', 'city.state_id')
            ->select('state.name as state_name','city.id','city.name')
            ->get();

        $payment=DB::table('payment_term')->get();
        return view('setting::setting/settingGeneral',compact('credit','state','city','payment'));
    }

//    ------------------------------ Credit Terms -------------------------------- //

    public function creditStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);

        $count=DB::table('credit_term')->where('name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('credit_term')->insert(['name' => $data['name']]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function creditDelete($id)
    {

        if($id)
        {
            DB::table('credit_term')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }


    //    ------------------------------ State -------------------------------- //

    public function stateStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);

        $count=DB::table('state')->where('name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('state')->insert(['name' => $data['name']]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function stateDelete($id)
    {
        if($id)
        {
            DB::table('state')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

    //    ------------------------------ City -------------------------------- //

    public function cityStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string','state_id'=>'required']);

        $count=DB::table('city')->where('name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('city')->insert(['name' => $data['name'],'state_id'=>$data['state_id']]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function cityDelete($id)
    {
        if($id)
        {
            DB::table('city')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }

    //   ------------------------------ Payment Terms -------------------------------- //

    public function paymentStore(Request $request)
    {
        $data= $request->validate(['name' => 'required|string']);

        $count=DB::table('payment_term')->where('name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('payment_term')->insert(['name' => $data['name']]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function paymentDelete($id)
    {
        if($id)
        {
            DB::table('payment_term')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
    }


//    ------------------------------- Duty Schedule ------------------------------- //
    public function dutySchedule()
    {
        $duty= DB::table('duty_Schedule')->get();
        return view('setting::setting/DutySchedule',compact('duty'));
    }

    public function dutyScheduleStore(Request $request)
    {
        $data= $request->validate([
            'startingTime' => 'required',
            'closingTime'=>'required',
            'days'=>'required|integer'
        ]);
        $duty= DB::table('duty_Schedule')->count();
        if($duty>0)
        {
            return redirect()->back()->with('exists','already Exists');
        }else
            {
                DB::table('duty_Schedule')->insert([
                    'in_time'=>$data['startingTime'],
                    'out_time'=>$data['closingTime'],
                    'day'=>$data['days']
                ]);

                return redirect()->back()->with('save','Saved Successfully');
            }

       }

       public function deletedutySchedule(Request $request)
       {
          DB::table('duty_Schedule')->where('id',$request->id)->delete();
          return redirect()->back()->with('save','Deleted Successfully');
       }




    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('setting::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::create');
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('setting::edit');
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
