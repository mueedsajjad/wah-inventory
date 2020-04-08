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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attendance()
    {
        $attendances=DB::table('attendance')
            ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
            ->join('users','attendance.userId','=','users.id')
            ->where('attendance.date', Carbon::today())->get();

        $user=DB::table('users')->get();
        return view('admin::attendance/attandance' ,compact('attendances', 'user'));
    }

    public function attendanceMark()
    {
        $user=DB::table('users')->get();

        $todayUsers=DB::table('attendance')
            ->select('attendance.*', 'users.*')
            ->join('users','attendance.userId','=','users.id')
            ->where('attendance.status',1)
            ->where('attendance.date', Carbon::today())
            ->where('attendance.outTime', null)
            ->get();
        //dd($todayUsers);
        return view('admin::attendance/markAttendance',compact('user', 'todayUsers'));
    }

    public function entranceEmployeeDetails(Request $request){
        //dd($request);
        $id=$request->id;
        if ($id!=0 || $id!='' || $id!=null) {
            $entranceEmployeeDetails = DB::table('users')->where('id', $id)->first();

            if ($entranceEmployeeDetails){
                return json_encode($entranceEmployeeDetails);
            }
            else{
                return json_encode('error');
            }
        }
        else{
            return json_encode('error');
        }
    }

    public function checkInAttendanceStore(Request $request)
    {
        $nowInTime = Carbon::now('Asia/Karachi');
        $nowInTime=$nowInTime->format('H:i');
       
        if ($request->entranceEmployeeStatus!='none'){
            $userId=$request->entranceEmployeeId;
            if($userId!=null || $userId!=0 || $userId!='' ){
                $status=$request->entranceEmployeeStatus;
                if ($status==1){
                    // $entranceEmployeeTime=$request->entranceEmployeeTime;
                    // if ($entranceEmployeeTime=='' || $entranceEmployeeTime==null){
                    //     return redirect()->back()->withErrors('Entrance Time of Employee is Required.');
                    // }
                    // else{
                        $nowInTime = Carbon::now('Asia/Karachi');
                        $nowInTime=$nowInTime->format('H:i');
    
                        $duty=DB::table('duty_schedule')->first();
                        if($duty) {
                            $inDuty = Carbon::parse($duty->in_time);
                        }
                        else{
                            return view('setting::setting/DutySchedule',compact('duty'));
                        }

                        $nowInTime = Carbon::parse($nowInTime);

                        //check employee is late or not
                        if ($nowInTime>$inDuty){
                            $checkIn="Late";
                        }
                        else{
                            $checkIn="Timely";
                        }
                    //}
                }
                else{
                    $nowInTime=null;
                    $checkIn="N/A";
                }

                //date_default_timezone_set("Asia/Karachi");
                $attendance=DB::table('attendance')->where('userId',$userId)
                    ->where('date',Carbon::today()->toDateString())
                    ->first();

                if($attendance)
                {
                    return redirect()->back()->with('exists','already marked checkIn attendance');
                }
                else
                {
                   
                    DB::table('attendance')->insert([
                        'userId'=> $userId,
                        'date'=> Carbon::today()->toDateString(),
                        'inTime'=> $nowInTime,
                        'status'=> $status,
                        'checkIn' => $checkIn
                    ]);
                    return redirect()->back()->with('save','Saved Successfully');
                }
            }
            else{
                return redirect()->back()->withErrors('Please First Select an Employee.');
            }
        }
        else{
            return redirect()->back()->withErrors('Please First Select Status.');
        }
    }

    public function departureEmployeeDetails(Request $request){
        //dd($request);
        $id=$request->id;
        if ($id!=0 || $id!='' || $id!=null) {
            $departureEmployeeDetails = DB::table('users')->where('id', $id)->first();

            if ($departureEmployeeDetails){
                return json_encode($departureEmployeeDetails);
            }
            else{
                return json_encode('error');
            }
        }
        else{

            return json_encode('error');
        }
    }

    public function checkOutAttendanceStore(Request $request)
    {
        $userId=$request->departureEmployeeId;
        if($userId!=null || $userId!=0 || $userId!='' ){
            //dd($request);
            // $data= $request->validate([
            //     'departureEmployeeTime' => 'required'
            // ]);
             
           

            $attendance=DB::table('attendance')->where('userId',$userId)
                ->where('date',Carbon::today()->toDateString())
                ->where('status',1)
                ->where('outTime',null)
                ->first();

            if($attendance)
            {
                //calculate Total Duty Time
                $duty=DB::table('duty_schedule')->first();
                if($duty)
                {
                    $inDuty = Carbon::parse($duty->in_time);
                    $outDuty = Carbon::parse($duty->out_time);
                    $interval = $inDuty->diff($outDuty);

                    $hourDuty = $interval->format('%h');
                    $minDuty =$interval->format('%i');
                   //$sec = $interval->format('%s second');

                    $dutyTime=date('H:i', mktime($hourDuty,$minDuty));
                }
                else
                {
                    $duty= DB::table('duty_Schedule')->get();
                    return view('setting::setting/DutySchedule',compact('duty'));
                }
                
                $nowOutTime = Carbon::now('Asia/Karachi');
                $nowOutTime=$nowOutTime->format('H:i');
                //calculate Total Working Time Done by Employee
                $outWorking=Carbon::parse($nowOutTime);
                $inWorking=Carbon::parse($attendance->inTime);
                $interval = $inWorking->diff($outWorking);
                $hourWorking = $interval->format('%h');
                $minWorking =$interval->format('%i');
                $workingTime=date('H:i', mktime($hourWorking,$minWorking));

                ////calculate Total over Time
                $dutyTimeInMints=$minDuty+($hourDuty*60);
                $workingTimeInMints=$minWorking+($hourWorking*60);
                if ($workingTimeInMints>$dutyTimeInMints){
                    $overTimeInMints=$workingTimeInMints-$dutyTimeInMints;
                    $overTime=date('H:i', mktime(0,$overTimeInMints));
                }
                else{
                    $overTime='00:00';
                }


                ////////////////////////////////////////////////////////////////////
                DB::table('attendance')->where('userId',$userId)
                    ->where('date',Carbon::today()->toDateString())->update([
                    'outTime'=> $nowOutTime,
                    'dutyTime' => $dutyTime,
                    'workingTime' => $workingTime,
                    'overTime'=> $overTime,
                ]);

                return redirect()->back()->with('save','Marked CheckOut Successfully');
            }
            else
            {
                return redirect()->back()->with('exists','already marked checkOut attendance');
            }
        }
        else{
            return redirect()->back()->withErrors('Please First Select an Employee.');
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

    // ------------------------------------ Attendance Report ---------------------------//
    public function attedanceReport()
    {
        $leave="";
        $late="";
        $name="";
        $overTimes="";

        $attendances=DB::table('attendance')
            ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
            ->join('users','attendance.userId','=','users.id')
            ->where('attendance.date', Carbon::today())->get();

        $user=DB::table('users')->get();
        return view('admin::report/attendenceReport' ,compact('attendances', 'user'
        ,'overTimes','leave','late','name'));
    }

    public function attendanceMWD(Request $request)
    {
        $attendances=[];
        $date=$request->validate(['id'=>'required']);
        
            $count=$request->type;
                if($count=="0")
                {
                   
                    $attendances=DB::table('attendance')
                    ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
                    ->join('users','attendance.userId','=','users.id')
                    ->where('attendance.date','=', Carbon::today())
                    ->where('users.id','=', $request->id)
                    ->get();
                }

                if($count==1)
                {
                    $now=Carbon::now();
                    $dateOfWeek=$now->weekday();
                    
                    $current_week=Carbon::now()->weekOfYear;

                   $date = $now;
                   
                    $date->setISODate(2020,$now->weekOfYear);
                    $mo = $date->startOfWeek()->toDateString();
                    $tu = $date->startOfWeek()->addDay(1)->toDateString();
                    $wd = $date->startOfWeek()->addDay(2)->toDateString();
                    $th = $date->startOfWeek()->addDay(3)->toDateString();
                    $fr = $date->startOfWeek()->addDay(4)->toDateString();
                    $st = $date->startOfWeek()->addDay(5)->toDateString();
                    $su = $date->startOfWeek()->addDay(6)->toDateString();
                  
                    $attendances=DB::table('attendance')
                    ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
                    ->join('users','attendance.userId','=','users.id')
                    ->whereBetween('attendance.date', [$mo,$su])
                    ->where('users.id','=', $request->id)
                    ->get();
                }
                if($count==2)
                {
                    
                    $startDate = Carbon::now();
                    $firstDay = $startDate->firstOfMonth();
                    $sm = $firstDay->toDateString();
                   
                    $endDay = $startDate->endOfMonth();
                    $em = $endDay->toDateString();

                   
                    $attendances=DB::table('attendance')
                    ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
                    ->join('users','attendance.userId','=','users.id')
                    ->whereBetween('attendance.date', [$sm,$em])
                    ->where('users.id','=', $request->id)
                    ->get();   
                }
        
            $toDate=$request->toDate;
            $fromDate=$request->fromDate;
        if($fromDate)
        {
            
            $attendances=DB::table('attendance')
            ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
            ->join('users','attendance.userId','=','users.id')
            ->whereBetween('attendance.date', [$fromDate,$toDate])
            ->where('users.id','=', $request->id)
            ->get();   

        }
       
        // ------ Sum of OverTime,Total Leaves, Total Lates Of Employee  ---------- //
         $leave=0;
         $late=0;
         $name="";
        $tempTime=date('H:i', mktime(0,0));
        $tempTime=Carbon::parse($tempTime);
        $addTime=date('H:i', mktime(0,0));
        $addTime=Carbon::parse($addTime);
        foreach($attendances as $attendance)
        {
            $name=$attendance->name;
           if($attendance->checkIn=="N/A")
           {
             $leave++;
           }
           if($attendance->checkIn!="Timely"&&$attendance->checkIn!="N/A")
           {
             $late++;
           }
           
        $inWorking=Carbon::parse($attendance->overTime);

       if($attendance->overTime!=null)
       {
                $interval = $tempTime->diff($inWorking);
     
                $hourWorking = $interval->format('%H');
                $minWorking =$interval->format('%i');
                $hourWorkingInt=(int) $hourWorking;
                $minWorkingInt =(int) $minWorking;
        
                $addTime=$addTime->addHours($hourWorkingInt);
                $addTime=$addTime->addMinutes($minWorkingInt);
        }

        }
        $overTimes=$addTime->format('H:i');

    $user=DB::table('users')->get();
    return view('admin::report/attendenceReport' ,compact('attendances',
     'user','overTimes','leave','late','name'));
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
