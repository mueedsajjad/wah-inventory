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
        $units=DB::table('unit') ->orderBy('id', 'desc')->get();
        $categories=DB::table('category') ->orderBy('id', 'desc')->get();
        $stores=DB::table('store') ->orderBy('id', 'desc')->get();
        $operations=DB::table('operation') ->orderBy('id', 'desc')->get();
        $departments=DB::table('departments') ->orderBy('id', 'desc')->get();
        $components=DB::table('component') ->orderBy('id', 'desc')->get();

        return view('setting::setting/setting',compact('units','categories','stores',
            'operations','departments','components'));
    }

    // -------------------------------- Component Create--------------------------- //

    public function componentStore(Request $request)
    {

        $data= $request->validate(['name' => 'required|string']);

        if (count(explode(' ', $request->name)) > 1) {
            $word = preg_split("/\s+/", $request->name);
            $arr = '';
            foreach ($word as $data) {
                $arr .= $data[0];
            }
            $user_id = 'C-'.$arr.'-'.date('s', time());
        }else{
            $fL = $request->name[0];
            $lL = $request->name[strlen($request->name) - 1];
            $fL = strtoupper($fL);
            $lL = strtoupper($lL);
            $user_id = 'C-'.$fL.$lL.'-'.date('s', time());
        }



        $count=DB::table('component')->where('component_name',$request->name)->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            DB::table('component')->insert(['component_name' => $request->name, 'component_id' => $user_id]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
    }

    public function componentDelete($id)
    {
        if($id)
        {
            DB::table('component')->where('id', $id)->delete();
            return redirect()->back()->with('delete','Deleted SuccessFully');
        }
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

    // ------------------------- Store ---------------------------------- //

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

//        --------------------------------- Leave Type ----------------------------------- //

      public function leave()
      {
          $leaves=DB::table('leave_type') ->orderBy('id', 'desc')->get();
          return view('setting::setting/leaveType',compact('leaves'));
      }

      public function leaveStore(Request $request)
      {
          $data= $request->validate(['name' => 'required|string']);

          $count=DB::table('leave_type')->where('leave_name',$data['name'])->count();
          if($count>0)
          {
              return redirect()->back()->with('exists','this record exist already');
          }
          else
          {
              DB::table('leave_type')->insert(['leave_name' => $data['name']]);
              return redirect()->back()->with('save', 'Saved Successfully');
          }
      }

      public function deleteLeave(Request $request)
      {
          DB::table('leave_type')->Where('id',$request->id)->delete();
          return redirect()->back()->with('save','Deleted Successfully');
      }

      // -------------------------- Product and Material Code Function ----------------------- //

      public function productAndMateralCode()
      {
        $materials=DB::table("setting_material") ->orderBy('id', 'desc')->get();
        $products=DB::table("setting_product") ->orderBy('id', 'desc')->get();
        return view("setting::setting/productAndMaterialCode",compact('products','materials'));
      }

      public function productAndMateralCodeStore(Request $request)
      {
          //dd($request);
        $data= $request->validate(
            [
                'name' => 'required|string',
                'type' => 'required'
            ]);

        if($data['type']==0)
        {
            $count=DB::table('setting_product')->where('product_name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            $newProduct=DB::table('setting_product')->orderBy('id', 'desc')->first();
            if($newProduct)
            {

                $id=$newProduct->id;
                $id++;
                $product_id="P000".$id;
            }
            else
            {
                $id=1;
                $product_id="P000".$id;
            }

            DB::table('setting_product')->insert([
                'product_name' => $data['name'],
                'product_code'=>$product_id
                ]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
        }

        else if($data['type']==1)
        {
            $count=DB::table('setting_material')->where('material_name',$data['name'])->count();
        if($count>0)
        {
            return redirect()->back()->with('exists','this record exist already');
        }
        else
        {
            $newProduct=DB::table('setting_material')->orderBy('id', 'desc')->first();

            if($newProduct)
            {

                $id=$newProduct->id;
                $id++;
                $product_id="P000".$id;
            }
            else
            {
                $id=1;
                $product_id="P000".$id;
            }
            DB::table('setting_material')->insert([
                'material_name' => $data['name'],
                'material_code'=>$product_id,
                ]);
            return redirect()->back()->with('save', 'Saved Successfully');
        }
        }

      }

      public function deleteMaterialCode(Request $request)
      {
          DB::table('setting_material')->Where('id',$request->id)->delete();
          return redirect()->back()->with('save','Deleted Successfully');
      }

      public function deleteProductCode($id)
      {
          DB::table('setting_product')->Where('id',$id)->delete();
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
