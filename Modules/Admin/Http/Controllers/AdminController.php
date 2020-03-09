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


        //dd($alluser);

        $user=User::all();
        $role=Role::all();
        $city=DB::table('city')->get();
        $state=DB::table('state')->get();
        $department=DB::table('departments')->get();

        return view('admin::employee/employee',compact('user','role','city','state',
            'department','alluser'));
    }


    public function employeeStore(Request $request)
    {

       //dd($request);
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

//             $data= $request->validate([
//                 'po_number' => 'required|string',
//                 'date'=>'required|date',
//                 'credit_term' => 'required|integer',
//             ]);


//        if ($request->hasFile('upload'))
//        {
//            $image = $request->file('upload');
//            $name = time() . '.' . $image->getClientOriginalName();
//            $destinationPath = public_path('upload');
//            // dd($name);
//            $image->move($destinationPath, $name);
//        }
//        else
//        {
//            $name=null;
//        }

//        $user_id= Auth::id();
//       // dd($user_id);
//
//        DB::table('purchase_order')->insert(['po_number'=>$data['po_number'],'po_date'=>$data['date'],
//'credit_term'=>$data['credit_term'],'upload'=> $name,'user_id'=>$user_id,'status'=>0]);
//
//        $last_id= DB::table('purchase_order')->orderBy('id', 'desc')->first();
////        $last_id=DB::table('purchase_order')->latest('id');
//
//        $purchase_id=$last_id->id;
//
//        //dd($purchase_id);
//        //dd($request->p_name0);
//        $count=$request->countConditions;
//        //dd($request->p_number1);
//
//        for($i=0;$i<=$count;$i++)
//        {
//            $po_number="p_number".$i;
//            $p_name="p_name".$i;
//            $p_d="p_description".$i;
//            $quantity="p_quantity".$i;
//            $unit_price="p_price".$i;
//            $total_price="p_total_price".$i;
//
//            $data=[
//                'purchase_id'=>$purchase_id,
//                'po_number'=>$request->$po_number,
//                'p_name'=>$request->$p_name,
//                'p_d'=>$request->$p_d,
//                'unit_id'=>1,
//                'quantity'=>$request->$quantity,
//                'unit_price'=>$request->$unit_price,
//                'total_price'=>$request->$total_price,
//            ];
//
//            $insert=DB::table('purchase_order_item')->insert($data);
        }
    }

    public function leave()
    {
        return view('admin::leave/leave');
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
