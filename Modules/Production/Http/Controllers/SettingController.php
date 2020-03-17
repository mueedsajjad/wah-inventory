<?php

namespace Modules\Production\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

//    public function setting()
//    {
//        $units=DB::table('unit')->get();
//        $categories=DB::table('category')->get();
//        $stores=DB::table('store')->get();
//        $operations=DB::table('operation')->get();
//        $departments=DB::table('departments')->get();
//
//        return view('production::setting/setting',compact('units','categories','stores','operations','departments'));
//    }
//
////   ----------------------- Unit  ---------------------------------- //
//    public function unitStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//        $count=DB::table('unit')->where('name',$data['name'])->count();
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else {
//            DB::table('unit')->insert(['name' => $data['name']]);
//            return redirect()->back()->with('save', 'Saved Successfully');
//        }
//    }
//
//    public function unitDelete($id)
//    {
//        if($id)
//        {
//            DB::table('unit')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//// -------------------------  Category ---------------------------------- //
//
//    public function categoryStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//        $count=DB::table('category')->where('name',$data['name'])->count();
//
//        if($count > 0)
//          {
//            return redirect()->back()->with('exists','this record exist already');
//          }
//         else
//             {
//             DB::table('category')->insert(['name'=> $data['name'] ]);
//             return redirect()->back()->with('save','Saved Successfully');
//            }
//    }
//
//    public function categoryDelete($id)
//    {
//        if($id)
//        {
//            DB::table('category')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//    // -------------------------  Store ---------------------------------- //
//
//    public function storeStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//        $count=DB::table('store')->where('name',$data['name'])->count();
//
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('store')->insert(['name'=> $data['name'] ]);
//            return redirect()->back()->with('save','Saved Successfully');
//        }
//    }
//
//    public function storeDelete($id)
//    {
//        if($id)
//        {
//            DB::table('store')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//    // -------------------------  Operation ---------------------------------- //
//
//    public function operationStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//        $count=DB::table('operation')->where('name',$data['name'])->count();
//
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('operation')->insert(['name'=> $data['name'] ]);
//            return redirect()->back()->with('save','Saved Successfully');
//        }
//    }
//
//    public function operationDelete($id)
//    {
//        if($id)
//        {
//            DB::table('operation')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }
//
//    // -------------------------  Department ---------------------------------- //
//    public function departmentStore(Request $request)
//    {
//        $data= $request->validate(['name' => 'required|string']);
//        $count=DB::table('departments')->where('name',$data['name'])->count();
//
//        if($count>0)
//        {
//            return redirect()->back()->with('exists','this record exist already');
//        }
//        else
//        {
//            DB::table('departments')->insert(['name'=> $data['name'] ]);
//            return redirect()->back()->with('save','Saved Successfully');
//        }
//    }
//
//    public function departmentDelete($id)
//    {
//        if($id)
//        {
//            DB::table('departments')->where('id', $id)->delete();
//            return redirect()->back()->with('delete','Deleted SuccessFully');
//        }
//    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('production::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('production::create');
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
        return view('production::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('production::edit');
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
