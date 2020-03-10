<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{


    public function attendance()
    {
        $attendance=DB::table('attendance')
            ->join('users','users.id','attendance.userId')
            ->where('date',Carbon::today())
            ->get();

        return view('admin::Attendance/attandance',compact('attendance'));
    }

    public function attendanceMark()
    {
        $user=DB::table('users')->get();
        return view('admin::Attendance/markAttendance',compact('user'));
    }

    public function checkInAttendanceStore(Request $request)
    {
        $data= $request->validate([
            'user_id' => 'required|string',
            'status' => 'required'
        ]);

        $attendance=DB::table('attendance')->where('userId',$data['user_id'])
            ->where('date',$request->date)
            ->first();

        if($attendance)
        {
            return redirect()->back()->with('exists','already marked checkIn Attendance');
        }
        else
        {
            if( $request->has('late') )
            {
                $checked=1;
            }
            else
                {
                    $checked=0;
                }
            $id=Auth::user();

            DB::table('attendance')->insert([

                'userId'=> $data['user_id'],
                'date'=> $request->date,
                'inTime'=> $request->inTime,
                'status'=> $data['status'],
                'late' =>  $checked,
                'markedEmployeeId'=> $id->id
            ]);

            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function checkOutAttendanceStore(Request $request)
    {
        $data= $request->validate([
            'user_id' => 'required|string',
            'departureTime' => 'required'
        ]);



        $attendance=DB::table('attendance')->where('userId',$data['user_id'])
            ->where('date',$request->date)
            ->where('outTime',null)
            ->first();

        //dd($attendance);
        if($attendance)
        {
            DB::table('attendance')->where('userId',$request->user_id)->update([
                'outTime'=> $request->departureTime
            ]);

            return redirect()->back()->with('save','Marked CheckOut Successfully');
        }
        else
        {
            return redirect()->back()->with('exists','already marked checkOut Attendance');
        }

    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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
