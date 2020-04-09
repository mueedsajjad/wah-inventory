<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    public function leave()
    {
        
       
        $employees=DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->get();

        $departments=DB::table('departments')->get();
        $leaves=DB::table('leave_type')->get();

        $allLeaves= DB::table('leave')
            ->join('users','users.id','leave.user_id')
            ->join('departments','departments.id','leave.department_id')
            ->join('leave_type','leave_type.id','leave.leave_type_id')
            ->select('users.name as userName','departments.*','leave_type.*','leave.*','leave.id as leaveId')
            ->get();

            //dd($allLeaves);
        return view('admin::leave/leave',compact('employees','departments','leaves','allLeaves'));
    }

    public function leaveToday()
    {
        $allLeaves= DB::table('leave')

        
        ->join('users','users.id','leave.user_id')
        ->join('departments','departments.id','leave.department_id')
        ->join('leave_type','leave_type.id','leave.leave_type_id')
        ->where('attendance.date',Carbon::today()->toDateString())
        ->join('attendance','attendance.leaveId','leave.id')
        ->select('users.name as userName','attendance.status as abc','departments.*','leave_type.*','leave.*','leave.id as leaveId')
        ->get();
        //dd($allLeaves);
        $employees=DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->get();

        $departments=DB::table('departments')->get();
        $leaves=DB::table('leave_type')->get();

        
        return view('admin::leave/leave',compact('employees','departments','leaves','allLeaves'));
    }

    public function leaveOfficer()
    {
        $user=Auth::user();
        $userId=$user->id;

        $employees=DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->get();

        $departments=DB::table('departments')->get();
        $leaves=DB::table('leave_type')->get();

        $allLeaves= DB::table('leave')
            ->join('users','users.id','leave.user_id')
            ->join('departments','departments.id','leave.department_id')
            ->join('leave_type','leave_type.id','leave.leave_type_id')
            ->where('leave.user_id',$userId)
            ->select('users.name as userName','departments.*','leave_type.*','leave.*','leave.id as leaveId')
            ->get();


        //dd($allLeaves);
        return view('admin::leave/leave',compact('employees','departments','leaves','allLeaves'));
    }

    public function leaveStore(Request $request)
    {
        //dd('abc');
        $data= $request->validate([
            'leave_date' => 'required|date',
            'leave_type_id' => 'required|integer',
            'reason' => 'required|string',
            'days' => 'required|integer',
            'toDate' => 'required|date',
            'fromDate' => 'required|date',
        ]);


        $user=Auth::user();
        $userId=$user->id;
        //dd($userId);
        $department=DB::table('employees')->where('user_id',$userId)->first();
        $department_id=$department->department_id;

       //dd($department_id);
            DB::table('leave')->insert(
                [
                'user_id'=> $userId,
                'department_id'=> $department_id,
                'leave_date'=> $data['leave_date'],
                'leave_type_id'=> $data['leave_type_id'],
                'reason'=> $data['reason'],
                'days'=> $data['days'],
                'fromDate'=> $data['fromDate'],
                'toDate'=> $data['toDate'],

                    'status'=> 0
                ]
            );

            return redirect()->back()->with('save','Saved Successfully');
    }

    public function deleteLeaveRequest(Request $request)
    {
        $data= $request->validate([
            'id' => 'required|integer'
        ]);

        DB::table('leave')->where('id', $data['id'])->delete();
        return redirect()->back()->with('save','Deleted Successfully');
    }

    public function acceptLeaveRequest($id)
    {
        DB::table('leave')->where('id', $id)
            ->update(
                ['status'=>1]
            );
        return redirect()->back()->with('save','Deleted Successfully');
    }

    public function rejectLeaveRequest($id)
    {
        DB::table('leave')->where('id', $id)
            ->update(
                ['status'=>2]
            );
        return redirect()->back()->with('save','Deleted Successfully');
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
