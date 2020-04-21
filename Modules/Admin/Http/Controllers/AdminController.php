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
use Illuminate\Support\Collection;


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
            ->orderBy('employees.id', 'desc')
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
        // dd($request);
        $salaryMonth=$request->salaryMonth;

        $workingDaysInWeek=0;
        $attendances=[];

        $id=$request->id;
        if ($id!=0 || $id!='' || $id!=null || $salaryMonth!=null || $salaryMonth!="") {
            //dd($id);
                    $count=$request->type;
                   // $startDate = $salaryMonth;
                    $startDate=Carbon::parse($salaryMonth);
                    $firstDay = $startDate->firstOfMonth();
                    //dd($firstDay);
                    $sm = $firstDay->toDateString();
                    $firstOne=$sm;

                    $endDay = $startDate->endOfMonth();
                    $em = $endDay->toDateString();
                    $secondOne=$em;

                    // Month Total Days //
                    $firstOne=Carbon::parse($firstOne);
                    //dd($secondOne);
                    $secondOne=Carbon::parse($secondOne);
                    $totalMonthDays = $firstOne->diffInDays($secondOne);
                    $totalMonthDays=$totalMonthDays+1;
                   // dd($totalMonthDays);

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
            //dd($hourWorkingInt);

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
           // dd($hourWorkingInt);
            $addTime=$addTime->addMinutes($minWorkingInt);

            // Difference Between Total Working Hours According to Working Days and  and Total Working Hours calculation//
            $addTime=Carbon::parse($addTime);
                // total working days in Month and divide salary by per hour //
                //$startDay=Carbon::parse($sm);
                //$startDay=$startDay->startOfWeek();
            //     $now=Carbon::now();
            //     $dateOfWeek=$startDay->weekday();
            //    if($dateOfWeek==0)
            //     {

            //     }
            //     dd($dateOfWeek);

               $workingDaysInWeek=7-$workingDaysInWeek;
               $workingDaysInMonth=$workingDaysInWeek*4;
               $workingDaysInMonth=$totalMonthDays-$workingDaysInMonth;
               // dd($workingDaysInMonth);

                $salaryEmployee = DB::table('users')->select('users.*','employees.*')
                ->join('employees', 'users.id', '=', 'employees.user_id')
                ->where('users.id', $id)->first();
               // dd($salaryEmployee);
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
                   // dd($hourWorkingInt);

                    // Salary Calculated according to Hours //
           // according to working previous work   //$netSalary=$hourWorkingInt*$perHourSalary;
                    $netSalary=$hourWorkingInt*$salaryEmployee->salary;
                    $netSalary=round($netSalary, 0);
                    $salaryEmployee->salary=$netSalary;
                    //dd($salaryEmployee);

                } else{
                    return redirect()->back()->with('exists','Employee Salary not defined monthly. Please Edit Employee Profile');
                }
                // dd($netSalary);
                if ($salaryEmployee){
                  //  dd($salaryEmployee);
                    return json_encode($salaryEmployee);
                }  else{
                   return json_encode('error');
                }

               //dd($netSalary);
        //    $user=DB::table('users')->get();
        //    return view('admin::salary/salaryPay',compact('user','salaryEmployee','netSalary'));
        }  else{
            return json_encode('error');
        }


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

            $alreadyAdvance=DB::table('advance')
                ->where('user_id',$data['userId'])
                ->whereNotIn('status',[4,0,1,2])
                ->first();
                //dd('abc');
            if($alreadyAdvance)
            {


                $deduction=$alreadyAdvance->advanceAmount/$alreadyAdvance->installment;

                if($data['salary']>$deduction)
                {
                    // salary greatern than salary then deduction //
                  $netSalary=$data['salary']-$deduction;

                  DB::table('salary')->insert(
                    [
                        'userId'=> $data['userId'],
                        'salary'=> $netSalary,
                        'salaryDate'=>Carbon::today()->toDateString(),
                        'installmentAmount'=>$deduction,
                        'installmentId'=>$alreadyAdvance->id
                    ]);

                    if($alreadyAdvance->recieveAmount>0)
                    {
                        $recieve=$alreadyAdvance->recieveAmount+$deduction;
                        if($recieve>=$alreadyAdvance->advanceAmount)
                        {
                            DB::table('advance')->where('id',$alreadyAdvance->id)->update(['recieveAmount'=>$recieve,'status'=>4]);

                        }
                        else{
                            DB::table('advance')->where('id',$alreadyAdvance->id)->update(['recieveAmount'=>$recieve]);

                        }

                    }
                    else{
                        $recieve=$deduction;
                        if($recieve>=$alreadyAdvance->advanceAmount)
                        {
                            DB::table('advance')->where('id',$alreadyAdvance->id)->update(['recieveAmount'=>$recieve,'status'=>4]);
                        }
                        else{
                            DB::table('advance')->where('id',$alreadyAdvance->id)->update(['recieveAmount'=>$recieve]);
                        }
                    }
                    // update([ 'status'=>2])
                    //dd($data);

                    return redirect()->back()->with('save','Salary Paid Successfully');


                    // $salary= DB::table('users')
                    // ->join('employees', 'users.id', '=', 'employees.user_id')
                    // ->join('salary','salary.userId','=','users.id')
                    // ->orderBy('salary.id','desc')
                    // ->get();

                    // return view('admin::salary/salary',compact('salary'))->with('save','saved');

                }

            }
           // dd('abcsss');
              DB::table('salary')->insert(
                [
                        'userId'=> $data['userId'],
                        'salary'=> $data['salary'],
                        'salaryDate'=>Carbon::today()->toDateString()
                ]);

                return redirect()->back()->with('save','Salary Paid Successfully');

        //   $salary= DB::table('users')
        //   ->join('employees', 'users.id', '=', 'employees.user_id')
        //   ->join('salary','salary.userId','=','users.id')
        //   ->orderBy('salary.id','desc')
        //   ->get();

        //   return view('admin::salary/salary',compact('salary'))->with('save','saved');

    }

    public function salaryDelete(Request $request)
    {
        DB::table('salary')->where('id',$request->id)->delete();
        return redirect()->back()->with('save','Deleted Successfully');
    }
    public function paidAndUnpaidEmployee()
    {

        $startDate=Carbon::parse(Carbon::today());
        $firstDay = $startDate->firstOfMonth();
        $sm = $firstDay->toDateString();
        $endDay = $startDate->endOfMonth();
        $em = $endDay->toDateString();

        $allUsers=DB::table('employees')
             ->join('users', 'users.id', '=', 'employees.user_id')
             ->join('departments', 'departments.id', '=', 'employees.department_id')
             ->join('state', 'state.id', '=', 'employees.state_id')
             ->join('city', 'city.id', '=', 'employees.city_id')
             ->select('employees.*', 'departments.name as department_name', 'users.name as username')
             ->get();


            //dd($allUsers);


        $paidEmployees=DB::table('users')
        ->join('employees', 'users.id', '=', 'employees.user_id')
        ->join('salary','salary.userId','=','users.id')
        ->whereBetween('salary.salaryDate', [$sm,$em])

        ->get();

       $paidEmployees=$paidEmployees->unique('user_id');

       $totalUnpaid=0;
       $totalPaid= 0;


       $i=0;
       $paidEmployees=$paidEmployees->unique('user_id');
       $employees = array();
       $temp=[];
       foreach($paidEmployees as $new)
       {
           $temp[]=$new->user_id;
       }

       foreach($allUsers as $alluser)
       {
           if (!in_array($alluser->user_id,$temp))
            {
                $totalUnpaid++;
               $employees[$i]['user_id']=$alluser->user_id;
               $employees[$i]['username']=$alluser->username;
               $employees[$i]['designation']=$alluser->designation;
            }
            else
            {
                $totalPaid++;
            }

          $i++;
      }



     return view('admin::salary.paidAndUnpaidSalary',compact('totalPaid','totalUnpaid'));

    }

    public function paidAndUnpaid($id)
    {
       $startDate=Carbon::parse(Carbon::today());
       $firstDay = $startDate->firstOfMonth();
       $sm = $firstDay->toDateString();
       $endDay = $startDate->endOfMonth();
       $em = $endDay->toDateString();


       $allUsers=DB::table('employees')
            ->join('users', 'users.id', '=', 'employees.user_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->join('state', 'state.id', '=', 'employees.state_id')
            ->join('city', 'city.id', '=', 'employees.city_id')
            ->select('employees.*', 'departments.name as department_name', 'users.name as username')
            ->get();


           //dd($allUsers);


       $paidEmployees=DB::table('users')
       ->join('employees', 'users.id', '=', 'employees.user_id')
       ->join('salary','salary.userId','=','users.id')
       ->whereBetween('salary.salaryDate', [$sm,$em])

       ->get();

       // dd($paidEmployees);
       $salary=$paidEmployees;
       if($id==1)
       {
         return view('admin::salary/salary',compact('salary'));
       }
       $i=0;
       $paidEmployees=$paidEmployees->unique('user_id');
       $employees = array();
       $temp=[];
       foreach($paidEmployees as $new)
       {
           $temp[]=$new->user_id;
       }

       foreach($allUsers as $alluser)
       {
           if (!in_array($alluser->user_id,$temp))
            {
               $employees[$i]['user_id']=$alluser->user_id;
               $employees[$i]['username']=$alluser->username;
               $employees[$i]['designation']=$alluser->designation;
            }

          $i++;
      }

     $allUsers=$employees;

     return view('admin::salary/unpaidEmployee',compact('salary','employees'));

    }

    public function advance()
    {

        $newAdvance=DB::table('advance')->orderBy('id', 'desc')->first();

        if($newAdvance)
        {
            $id=$newAdvance->id;
            $id++;
        }
        else
        {
            $id=1;
        }
        Auth::user();
        $users=DB::table('users')->get();
        return view('admin::advance/advance',compact('users','id'));
    }

    public function advanceStore(Request $request)
    {
        //dd('abc');
       $data=$request->validate(
           [
            'user_id'=>'required|integer',
            'recieptNo'=>'required',
            'date'=>'required|date',
            'advanceDate'=>'required|date',
            'installment'=>'required|integer',
            'advanceAmount'=>'required|integer'
           ]
        );
        //$query="select * from advance";
        $id=Auth::user()->id;
       // $advance=DB::select("select * from advance where user_id=$id and status !=2");
        //dd($advance);
        $alreadyAdvance=DB::table('advance')
        ->where('user_id',Auth::user()->id)
        ->whereNotIn('status',[4])
        ->first();


       if($alreadyAdvance)
       {
        if($alreadyAdvance->status==0)
        {
            return redirect()->back()->with('exists', "Already Applied For Advance");
        }
        if($alreadyAdvance->status==1)
        {
            return redirect()->back()->with('exists', "Advanced is Approved Already");
        }
        if($alreadyAdvance->status==3)
        {
            return redirect()->back()->with('exists', "Previous Advanced is not paid Already");
        }

       }

        DB::table('advance')->insert([
             'user_id'=>$data['user_id'],
             'recieptNo'=>$data['recieptNo'],
             'advanceDate'=>$data['advanceDate'],
             'date'=>$data['date'],
             'installment'=>$data['installment'],
             'advanceAmount'=>$data['advanceAmount'],
             'recieveAmount'=>0,
             'status'=>0
        ]);
        return redirect()->back()->with('save', "Applied For Advance Successfully");
    }
    public function advanceEmployee()
    {
         $advances=DB::table('users')
         ->join('advance','advance.user_id','=','users.id')
         ->where('advance.user_id',Auth::user()->id)
         ->get();
        //dd($advances);
        return view('admin::advance/advanceEmployee',compact('advances'));
    }

    public function advanceEmployeeAccept()
    {
         $advances=DB::table('users')
         ->join('advance','advance.user_id','=','users.id')
         ->get();
       // dd($advances);
        return view('admin::advance/advanceEmployeeAccept',compact('advances'));
    }

    public function loanReject($id)
    {
        DB::table('advance')->where('id',$id)->update([ 'status'=>2]);
        return redirect()->back()->with('save', "Rejected Successfully");
    }
    public function loanAccept($id)
    {
        DB::table('advance')->where('id',$id)->update([ 'status'=>1]);
        return redirect()->back()->with('save', "Approved Successfully");
    }

    public function loanIssue($id)
    {
        DB::table('advance')->where('id',$id)->update([ 'status'=>3]);
        return redirect()->back()->with('save', "Loan Issued Successfully");
    }

    public function advanceDelete(Request $request)
    {
        DB::table('advance')->where('id',$request->id)->delete();
        return redirect()->back()->with('save','Deleted Successfully');
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
