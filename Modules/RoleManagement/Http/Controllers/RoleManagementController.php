<?php

namespace Modules\RoleManagement\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewRoles(){
        $role=Role::all();
        return view('rolemanagement::create-roles', compact('role'));
    }

    public function storeRole(Request $req)
    {
        Role::create(['name' => $req->name]);
        return redirect()->back();
    }

    public function viewPermissions(){
        $permission=Permission::all();
        return view('rolemanagement::create-permissions', compact('permission'));
    }

    public function storePermission(Request $req)
    {
        Permission::create(['name' => $req->name]);
        return redirect()->back();
    }

    public function permitDelete($id)
    {
        $delete=Permission::find($id);
        $delete->delete();
        return redirect()->back();
    }

    public function assignPermissions()
    {
        $role=Role::all();
        $permission=Permission::all();

        return view('rolemanagement::assign-permissions-ajax',compact('role','permission'));
//        return view('rolemanagement::assign-permission-to-role',compact('role','permission'));

    }

    public function StoreAssignPermissions(Request $req)
    {

        $role=Role::findById($req->role);

        if ($req->permissions == null){
            return redirect()->back()->with('status', 'Please select minimum 1 permission');
        }
        foreach($req->permissions as $data){
            $permission=Permission::findById($data);

            $role->givePermissionTo($permission->name);
        }
        return redirect()->back();

    }

    public function assignRoles()
    {
        $user=User::all();
        $role=Role::all();

        return view('rolemanagement::assign-role-to-user',compact('user','role'));
    }

    public function StoreAssignRoles(Request $req)
    {
        $user=User::find($req->user);
        $role=Role::findById($req->role);
        $user->assignRole($role->name);
        return redirect()->back();

    }

    public function checkPermissions($id)
    {
        $role=Role::findById($id);
        $assignPermission=$role->permissions;
        if (count($assignPermission))
        {
            $id=[];
            foreach ($assignPermission as $data)
            {
                $id[]=$data->id;
            }
            $permissions=Permission::whereNotin('id',$id)->get();
        }
        else
        {
            $permissions=Permission::all();
        }
        return view('rolemanagement::assign-permission',compact('assignPermission','permissions','role'));
    }

    public function unChecked(Request $req){

        $role=Role::findById($req->role);
        $rolePermission=$role->permissions;

        $permissions=$req->permissions;





        if (count($rolePermission))
        {
            $id=[];
            foreach ($rolePermission as $data) {
                $id[]=$data->id;

            }
            if(count($id)==1)
            {
                $per=Permission::findById($id[0]);

                $role->revokePermissionTo($data);
                return redirect()->back();

            }


            $unchecked=array_diff($id,$permissions);

        }

        if ($unchecked == null){
            return redirect()->back()->with('status', 'Please UnChecked minimum 1 permission');
        }

       foreach ($unchecked as $data)
       {
           $revokePermissions[]=Permission::findById($data);
       }


        foreach ($revokePermissions as $data)
        {
            $role->revokePermissionTo($data);
        }
        return redirect()->back();
    }



    public function getPermissions($id){

        $role=Role::findById($id);
        $assignPermission=$role->permissions;
        if (count($assignPermission))
        {
            $id=[];
            foreach ($assignPermission as $data)
            {
                $id[]=$data->id;
            }
            $permissions=Permission::whereNotin('id',$id)->pluck('name', 'id');
        }
        else
        {
            $permissions=Permission::all();
        }

//        return view('rolemanagement::assign-permission',compact('assignPermission','permissions','role'));

//      return  json_encode($assignPermission);



    }
    public function getPermission(Request $request){

        $role = Role::all();

        $role_id =  $request->role;





        $roles=Role::findById($role_id);


        $assignPermission=$roles->permissions;

        if (count($assignPermission))
        {
            $id=[];
            foreach ($assignPermission as $data)
            {
                $id[]=$data->id;
            }
            $permissions=Permission::whereNotin('id',$id)->get();
        }
        else
        {
            $permissions=Permission::all();
        }


//        return $permissions;
        return view('rolemanagement::assign-permissions-ajax',compact('assignPermission','permissions','role_id', 'role', 'roles'));

//      return  json_encode($assignPermission);



    }

}
