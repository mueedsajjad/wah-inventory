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

//        $managers = User::role('Manager')->get();

//        dd($managers);

//        $manager=DB::table('employees')
//            ->join('users', 'users.id', '=', 'employees.user_id')
//            ->join('departments', 'departments.id', '=', 'employees.department_id')
//            ->join('state', 'state.id', '=', 'employees.state_id')
//            ->join('city', 'city.id', '=', 'employees.city_id')
//            ->join('roles', 'roles.id','=','employees.designation_id')
//            ->where('roles','Manager')
//            ->select('employees.*','users.email','roles.id as role_id','state.name as state','roles.name as role','city.name as city', 'departments.name as department_name', 'users.name as username')
//            ->get();


        //dd($managers);

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
                    'upload'=>$name
                ]);

            return redirect()->back()->with('save', 'Submit Successfully!');

        }
    }

    public function employeeDetail($id)
    {

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

       //dd($user);
        return view('admin::employee/employeeDetail',compact('user'
        ,'role','city','state', 'department'));
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
        return view('admin::salary/salary');
    }

    public function advance()
    {
        return view('admin::advance/advance');
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
        return view('admin::dashboard');
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
