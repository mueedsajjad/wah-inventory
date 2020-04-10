<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employee()
    {
        // --- join query to see inforamtion of All Employees -- //


        $alluser=DB::table('employees')
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('state', 'state.id', '=', 'employees.state_id')
            ->join('city', 'city.id', '=', 'employees.city_id')
            ->select('employees.*', 'departments.name as department_name', 'users.name as username')
            ->get();

//        dd($alluser);

        $user=User::all();
        $role=Role::all();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $department=DB::table('departments')->get();

        $managers=DB::table('employees')

            ->join('roles', 'roles.id','=','employees.designation_id')
            ->join('users','users.id','=','employees.user_id')
            ->where('roles.name','Manager')
            ->select('employees.*','users.*', 'users.name as userName','roles.*','roles.name as roleName')
            ->get();

        return view('admin::employee/employee',compact('user','role','city','state',
            'department','alluser','managers'));
    }
    public function employeeDepartmentWise($id)
    {
        // --- join query to see inforamtion of All Employees -- //


        $alluser=DB::table('employees')
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('state', 'state.id', '=', 'employees.state_id')
            ->join('city', 'city.id', '=', 'employees.city_id')
            ->where('departments.id','=',$id)
            ->select('employees.*', 'departments.name as department_name', 'users.name as username')
            ->get();

       //dd($alluser);

        $user=User::all();
        $role=Role::all();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $department=DB::table('departments')->get();

        $managers=DB::table('employees')

            ->join('roles', 'roles.id','=','employees.designation_id')
            ->join('users','users.id','=','employees.user_id')
            ->where('roles.name','Manager')
            ->select('employees.*','users.*', 'users.name as userName','roles.*','roles.name as roleName')
            ->get();

        return view('admin::employee/employee',compact('user','role','city','state',
            'department','alluser','managers'));
    }


    public function employeeStore(Request $request)
    {
//      dd($request);
        $data= $request->validate([
            'name' => 'required|string',
            'department_id'=>'required|integer',
            'designation_id'=>'required|integer',
            'email'=>'required|email',
            'mobile'=>'required|string',
            'gender_id'=>'required|integer',
            'state_id'=>'required|integer',
            'city_id'=>'required|integer',
            'password'=>'required',
            'address'=>'required',
            'salary'=>'required|integer',
            'createdDate'=>'required|date',
            'designation'=>'required|string',
          
            'joinDate'=>'required|date',
            
        ]);
        //dd($data);
        $exist=DB::table('users')->where('email',$data['email'])->first();

        if ($exist)
        {
            return redirect()->back()->with('exists','This username already exists');
        }
        else
            {
            $role = Role::find($data['designation_id']);
          // dd( $role);
            $user = New User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
//          $user->manager_id=$request->manager_id;
            $user->assignRole($role->name);
            $user->save();

// ------------------- files ------------------------- //

            if ($request->hasFile('upload'))
            {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalName();
                $destinationPath = public_path('upload');
                //dd($name);
                $image->move($destinationPath, $name);
            }
            else
            {
                $name=null;
            }
            $user= DB::table('users')->orderBy('id', 'desc')->first();
            $user_id=$user->id;

            DB::table('employees')->insert(
                [
                    'user_id'=> $user_id,
                    'department_id'=>$data['department_id'],
                    'designation_id'=>$data['designation_id'],
                    'mobile' =>$data['mobile'],
                    'gender_id' =>$data['gender_id'],
                    'city_id' =>$data['city_id'],
                    'state_id' =>$data['state_id'],
                    'address' =>$data['address'],
                    'salary' =>$data['salary'],
                    'createdDate' =>$data['createdDate'],
                    'joinDate' =>$data['joinDate'],
                   
                    'designation' =>$data['designation'],
                    'upload'=>$name
                ]);

            return redirect()->back()->with('save', 'Submit Successfully!');

        }
    }

    public function employeeUnderManagerStore(Request $request)
    {

        $data= $request->validate([
            'name' => 'required|string',
            'department_id'=>'required|integer',
            'designation_id'=>'required|integer',
            'manager_id'=>'required|integer',
            'email'=>'required|email',
            'mobile'=>'required|string',
            'gender_id'=>'required|integer',
            'state_id'=>'required|integer',
            'city_id'=>'required|integer',
            'password'=>'required',
            'address'=>'required',
            'salary'=>'required|integer',
            'createdDate'=>'required|date',
            'designation'=>'required|string',
           
            'joinDate'=>'required|date',

        ]);
        //dd($data);
        $exist=DB::table('users')->where('email',$data['email'])->first();

        if ($exist)
        {
            return redirect()->back()->with('exists','This username already exists');
        }
        else
        {
            $role = Role::find($data['designation_id']);
            // dd( $role);
            $user = New User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->manager_id=$request->manager_id;
            $user->assignRole($role->name);
            $user->save();

// ------------------- files ------------------------- //

            if ($request->hasFile('upload'))
            {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalName();
                $destinationPath = public_path('upload');
                //dd($name);
                $image->move($destinationPath, $name);
            }
            else
            {
                $name=null;
            }
            $user= DB::table('users')->orderBy('id', 'desc')->first();
            $user_id=$user->id;


            DB::table('employees')->insert(
                [
                    'user_id'=> $user_id,
                    'department_id'=>$data['department_id'],
                    'designation_id'=>$data['designation_id'],
                    'mobile' =>$data['mobile'],
                    'gender_id' =>$data['gender_id'],
                    'city_id' =>$data['city_id'],
                    'state_id' =>$data['state_id'],
                    'address' =>$data['address'],
                    'salary' =>$data['salary'],
                    'createdDate' =>$data['createdDate'],
                    'joinDate' =>$data['joinDate'],
                   
                    'designation' =>$data['designation'],
                    'upload'=>$name
                ]);

            return redirect()->back()->with('save', 'Submit Successfully!');

        }
    }

    public function employeeDetail($id)
    {
        

        // $user=DB::table('employees')
        //     ->join('users', 'users.id', '=', 'employees.user_id')
        //     ->join('departments', 'departments.id', '=', 'employees.department_id')
        //     ->join('state', 'state.id', '=', 'employees.state_id')
        //     ->join('city', 'city.id', '=', 'employees.city_id')
        //     ->join('roles', 'roles.id','=','employees.designation_id')
        //     ->where('users.id',$id)
        //     ->select('employees.*','users.email','roles.id as role_id','state.name as state','roles.name as role','city.name as city', 'departments.name as department_name', 'users.name as username')
        //     ->get();



        $user=User::all();
        $role=Role::all();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $department=DB::table('departments')->get();

        $user=DB::table('employees')
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('state', 'state.id', '=', 'employees.state_id')
            ->join('city', 'city.id', '=', 'employees.city_id')
            ->join('roles', 'roles.id','=','employees.designation_id')
            ->where('users.id',$id)
            ->select('employees.*','users.email','roles.id as role_id','state.name as state','roles.name as role','city.name as city', 'departments.name as department_name', 'users.name as username')
            ->get();


            foreach($user as $users)
            {
        //         $this->birthdate->diff(Carbon::now())
        //  ->format('%y years, %m months and %d days');

                $todayDate = Carbon::now('Asia/Karachi');
                $todayDate= $todayDate->toDateString();
                $todayDate=Carbon::parse($todayDate);
                $joinDate=Carbon::parse($users->joinDate);
                // $length = $todayDate->diff($joinDate);
                $length = $todayDate->diff($joinDate)
                ->format('%y years, %m months and %d days');

                //dd($length);
            }
            

       //dd($user);
        return view('admin::employee/employeeDetail',compact('user'
        ,'role','city','state', 'department','length'));
    }

    public function employeeDelete($id)
    {
        $user=DB::table('employees')->where('id',$id)->first();
        DB::table('employees')->where('id',$user->id)->delete();
        DB::table('users')->where('id',$user->user_id)->delete();

        return redirect()->back()->with('delete','Has been Deleted successfully');
    }

    public function employeeEdit(Request $request)
    {
        $data= $request->validate([
            'name' => 'required|string',
            'department_id'=>'required|integer',
            'designation_id'=>'required|integer',
            'email'=>'required|email',
            'mobile'=>'required|string',
            'gender_id'=>'required|integer',
            'state_id'=>'required|integer',
            'city_id'=>'required|integer',
            'password'=>'required',
            'address'=>'required',
            'salary'=>'required|integer',
            'createdDate'=>'required|date',
            'joinDate'=>'required|date',
            'designation'=>'required|string',
           
            
        ]);


            $oldRecord= DB::table('employees')->where('id',$request->id)->first();
            //dd($oldRecord);
            $role = Role::find($data['designation_id']);
            $roleRomove = Role::find($oldRecord->designation_id);
            // dd( $role);
            $user = New User;

           // $user->assignRole($role->name);
            $user->removeRole($roleRomove->name);
            $user->assignRole($role->name);


            DB::table('users')->where('id',$request->user_id)
                ->update(
                    [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password)
                ]);


// ------------------- files ------------------------- //

            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $name = time() . '.' . $image->getClientOriginalName();
                $destinationPath = public_path('upload');
                //dd($name);
                $image->move($destinationPath, $name);
            } else {
                if($oldRecord->upload !=null)
                {
                    $name = $oldRecord->upload;
                }
                else
                {
                    $name = null;
                }

            }

            DB::table('employees')->where('id',$request->id)->update(
                [
                    'department_id' => $data['department_id'],
                    'designation_id' => $data['designation_id'],
                    'mobile' => $data['mobile'],
                    'gender_id' => $data['gender_id'],
                    'city_id' => $data['city_id'],
                    'state_id' => $data['state_id'],
                    'address' => $data['address'],
                    'salary' =>$data['salary'],
                    'createdDate' =>$data['createdDate'],
                    'joinDate' =>$data['joinDate'],
                    'designation' =>$data['designation'],
                    'upload' => $name
                ]);

            return redirect()->back()->with('save', 'Edited Successfully!');

    }

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

   // ----------------------------------- Employee List Report  ---------------------------------- //
    public function employeeReport()
    {

        $user=User::all();
        $role=Role::all();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $department=DB::table('departments')->get();

        $users=DB::table('employees')
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('state', 'state.id', '=', 'employees.state_id')
            ->join('city', 'city.id', '=', 'employees.city_id')
            ->join('roles', 'roles.id','=','employees.designation_id')
            ->select('employees.*','users.email','roles.id as role_id','state.name as state','roles.name as role','city.name as city', 'departments.name as department_name', 'users.name as username')
            ->get();

        //dd($user);
      return view('admin::report/employeeReport',compact('users'
            ,'role','city','state', 'department'));

        //return view('admin::report/employeeReport');
    }

    public function salary()
    {
        $salary= DB::table('users')
        ->join('employees', 'users.id', '=', 'employees.user_id')
        ->join('salary','salary.userId','=','users.id')
        ->orderBy('salary.id','desc')
        ->get();

        //dd($salary);
        return view('admin::salary/salary',compact('salary'))->with('save','saved');
    }
    
    public function salaryEmployee()
    {
        $salaryEmployee="";
        $netSalary=0;
        $user=DB::table('users')->get();
        return view('admin::salary/salaryToEmployee',compact('user','salaryEmployee','netSalary'));
    }

    
    public function employeeSalaryDetails(Request $request){
      
        $id=$request->Employee;
        //dd($id);
        $salaryMonth=$request->salaryMonth;

        $workingDaysInWeek=0;
        $attendances=[];
       // $date=$request->validate(['id'=>'required']);
        
            $count=$request->type;
                
                    $startDate = $salaryMonth;
                    $startDate=Carbon::parse($salaryMonth);
                    $firstDay = $startDate->firstOfMonth();
                    $sm = $firstDay->toDateString();
                   
                    $endDay = $startDate->endOfMonth();
                    $em = $endDay->toDateString();
                    
                   
                    $attendances=DB::table('attendance')
                    ->select('attendance.*', 'users.*', 'attendance.id as attendance_id')
                    ->join('users','attendance.userId','=','users.id')
                    ->whereBetween('attendance.date', [$sm,$em])
                    ->where('users.id','=', $id)
                    ->get();  
                    //dd( $attendances);
                    
                //}
        
            // $toDate=$request->toDate;
            // $fromDate=$request->fromDate;
            
        $dutySchedule=DB::table('duty_schedule')->first();
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

                    $workingDaysInWeek=$duty->day;
                }
                else
                {
                    $duty= DB::table('duty_Schedule')->get();
                    return view('setting::setting/DutySchedule',compact('duty'));
                }
        // ------ Sum of OverTime,Total Leaves, Total Lates Of Employee  ---------- //
         $leave=0;
         $absent=0;
         $late=0;
         $present=0;
         $name="";
        $tempTime=date('H:i', mktime(0,0));
        $tempTime=Carbon::parse($tempTime);
        $totalTime=date('H:i', mktime(0,0));
        $totalTime=Carbon::parse($totalTime);
        $addTime=date('H:i', mktime(0,0));
        $addTime=Carbon::parse($addTime);

        foreach($attendances as $attendance)
        {
            $name=$attendance->name;
           if($attendance->checkIn=="N/A")
           {
             $absent++;
           }
           else if($attendance->checkIn=="Late")
           {
             $late++;
             $present++;
           }
           elseif($attendance->checkIn=="Leave")
           {
               $leave++;
           }

           if($attendance->checkIn=="Timely")
           {
               $present++;
           }
          
        $dutyTime=Carbon::parse($dutyTime);
        

         if($attendance->workingTime!=null)
         {
            //  Total Working Hours calculation  //   
            $interval = $tempTime->diff($attendance->workingTime);
            $hourWorking = $interval->format('%H');
            $minWorking =$interval->format('%i');
            $hourWorkingInt=(int) $hourWorking;
            $minWorkingInt =(int) $minWorking;
        
            $addTime=$addTime->addHours($hourWorkingInt);
            $addTime=$addTime->addMinutes($minWorkingInt);
         }

        }
          
            $addTime=Carbon::parse($addTime);
        //  Total Working Hours According to Working Days and Total Working Hours calculation //
            $interval = $tempTime->diff($dutyTime);
            $hourWorking = $interval->format('%H');
            $minWorking =$interval->format('%i');
            $hourWorkingInt=(int) $hourWorking;
            $minWorkingInt =(int) $minWorking;
            $hourWorkingInt= $hourWorkingInt*$leave;
            $minWorkingInt= $minWorkingInt*$leave;
        
            $addTime=$addTime->addHours($hourWorkingInt);
            $addTime=$addTime->addMinutes($minWorkingInt);

            // Difference Between Total Working Hours According to Working Days and  and Total Working Hours calculation//
            $addTime=Carbon::parse($addTime);
                // total working days in Month and divide salary by per hour //
                $workingDaysInWeek=7-$workingDaysInWeek;
                $workingDaysInMonth=$workingDaysInWeek*4;

                $salaryEmployee = DB::table('users')->select('users.*','employees.*')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->where('users.id', $id)->first();
                //dd($entranceEmployee);
                if($salaryEmployee)
                {
                    if($salaryEmployee->salary==null)
                    {
                        return redirect()->back()->with('exists','Employee Salary not defined monthly. Please Edit Employee Profile');
                    }
                    $salary=$salaryEmployee->salary;
                
                    $perDaySalary=$salary/ $workingDaysInMonth;
                    // getting Daily DutyHour //
                    $interval = $tempTime->diff($dutyTime);
                    $hourWorking = $interval->format('%H');
                    $hourWorkingInt=(int) $hourWorking;
                    $perHourSalary=$perDaySalary/$hourWorkingInt;
    
                    // Total Working Hours //
                    $interval = $tempTime->diff($addTime);
                    $hourWorking = $interval->format('%H');
                    $hourWorkingInt=(int) $hourWorking;
                    
                    // Salary Calculated according to Hours //
                    $netSalary=$hourWorkingInt*$perHourSalary;
                    $netSalary=round($netSalary, 0);
                   
                } else{
                    return redirect()->back()->with('exists','Employee Salary not defined monthly. Please Edit Employee Profile');
                }
                
               
        $user=DB::table('users')->get();
        return view('admin::salary/salaryPay',compact('user','salaryEmployee','netSalary'));

    }
    
    public function salaryStore(Request $request)
    {
            $data= $request->validate(
                [
                    'userId' => 'required',
                    'salary' => 'required',         
                ]);
        //    if($data['salary']<1)
        //    {
        //       return redirect()->back()->with('exists','Salary cannot be paid coz less than 1');
        //    }
        //    else{
            DB::table('salary')->insert(
                [ 
                    'userId'=> $data['userId'],
                    'salary'=> $data['salary'],
                    'salaryDate'=>Carbon::today()->toDateString()
                ]);
          // }
          $salary= DB::table('users')
          ->join('employees', 'users.id', '=', 'employees.user_id')
          ->join('salary','salary.userId','=','users.id')
          ->orderBy('salary.id','desc')
          ->get();
  
          //dd($salary);
          return view('admin::salary/salary',compact('salary'))->with('save','saved');
    }

    public function salaryDelete(Request $request)
    {
        //dd($request->id);
        DB::table('salary')->where('id',$request->id)->delete();
        return redirect()->back()->with('save','Deleted Successfully');
    }
    
    public function advance()
    {
        return view('admin::advance/advance');
    }
    public function advanceEmployee()
    {
        return view('admin::advance/advanceEmployee');
    }


    public function report()
    {
        return view('admin::report/report');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = DB::table('employees')->count();
        //dd($users);
        return view('admin::dashboard',compact('users'));
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
