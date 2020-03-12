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
        $duty=DB::table('duty_schedule')->first();

      $outt=Carbon::parse($duty->out_time);
      $inn=Carbon::parse($duty->in_time);

      $totalMinutes = $outt->diffInMinutes($inn);
      $totalHours = $outt->diffInHours($inn);

      //dd($totalHours);
      //dd($totalMinutes);

      $totalCalculatedHours = $totalHours*60;
      $totalCalculatedMinutes= $totalMinutes- $totalCalculatedHours;



        if($totalCalculatedMinutes<0)
        {
            $totalCalculatedMinutes=$totalCalculatedMinutes * -1;
        }

     // dd($totalCalculatedMinutes);
//      dd($totalMinutes);


        $user=DB::table('users')->get();
        $attendances=DB::table('attendance')
            ->join('users','users.id','attendance.userId')
            ->where('date',Carbon::today()->toDateString())
            ->select('attendance.*','users.*','attendance.id as attendance_id')
            ->get();
        $i=0;


        foreach ($attendances as $attendance)
        {
            $totalCalculatedMinutesSencond[$attendance->userId]=0;

            $totalCalculatedMinutesSencond[$attendance->userId]=$totalCalculatedMinutes;
            //dd($totalCalculatedMinutesSencond);

            $out=Carbon::parse($attendance->outTime);
            $in=Carbon::parse($attendance->inTime);
            $totalPerformedMinutes = $out->diffInMinutes($in);
            $totalPerformedHour = $out->diffInHours($in);

            $totalPerforminingHour[$attendance->userId]=$totalPerformedHour;

            //dd($totalPerformedHour);
            $HoursMin=60*$totalPerformedHour;
            //dd($HoursMin);

            $RemainMin= $totalPerformedMinutes- $HoursMin;

            //dd($RemainMin);

             $nettime = $totalPerformedMinutes-$totalMinutes;

            // dd($nettime);

            if($nettime<0)
            {
                $nettime=$nettime * -1;
            }

            $nettimes[$attendance->userId]=  $RemainMin;

            $remainingHour[$attendance->userId]=$nettime/60;
            $remainingHour[$attendance->userId]=intval( $remainingHour[$attendance->userId]);

            //dd($remainingHour[$attendance->userId]);
            //$netminutes[$attendance->userId]=0;


            $remainingMinutes[$attendance->userId]= $remainingHour[$attendance->userId]*60;
          // dd($remainingMinutes[$attendance->userId]);
            $netminutes[$attendance->userId]=$nettime-$remainingMinutes[$attendance->userId];


    }

        return view('admin::attendance.attandance',compact('attendances','user'
            ,'totalMinutes','totalHours','netminutes','remainingHour','totalCalculatedMinutesSencond'
        ,'nettimes','totalPerforminingHour'));

    }

    public function attendanceMark()
    {
        $user=DB::table('users')->get();
        return view('admin::attendance/markAttendance',compact('user'));
    }

    public function checkInAttendanceStore(Request $request)
    {
        $data= $request->validate([
            'user_id' => 'required|string',
            'status' => 'required'
        ]);

        $attendance=DB::table('attendance')->where('userId',$data['user_id'])
            ->where('date',Carbon::today()->toDateString())
            ->first();

        if($attendance)
        {
            return redirect()->back()->with('exists','already marked checkIn attendance');
        }
        else
        {
            DB::table('attendance')->insert([
                'userId'=> $data['user_id'],
                'date'=> Carbon::today()->toDateString(),
                'inTime'=>Carbon::now(),
                'status'=> $data['status']
            ]);
            return redirect()->back()->with('save','Saved Successfully');
        }
    }

    public function checkOutAttendanceStore(Request $request)
    {
        $data= $request->validate([
            'user_id' => 'required|string'
        ]);

        $attendance=DB::table('attendance')->where('userId',$data['user_id'])
            ->where('date',Carbon::today()->toDateString())
            ->where('outTime',null)
            ->first();

        if($attendance)
        {
            DB::table('attendance')->where('userId',$request->user_id)->update([
                'outTime'=> Carbon::now()
            ]);

            return redirect()->back()->with('save','Marked CheckOut Successfully');
        }
        else
        {
            return redirect()->back()->with('exists','already marked checkOut attendance');
        }

    }

    public function deleteAttendance(Request $request)
    {
        DB::table('attendance')->where('id',$request->id)->delete();
        return redirect()->back()->with('save','Deleted Successfully');
    }

    public function editAttendance(Request $request)
    {
        DB::table('attendance')
            ->where('id',$request->id)
            ->update([
                'date'=>$request->date,
                'inTime'=>$request->inTime,
                'outTime'=>$request->departureTime,
                'status'=>$request->status
            ]);

        return redirect()->back()->with('save','Updated Successfully');
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
