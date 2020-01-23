<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use DB;
class RoleController extends Controller
{
    //

     public function create(){
         $permissions=Permission::all();
         return view('admin-view.roles.create',compact('permissions'));
     }

    public function index(){
          $roles=Role::all();
        return view('admin-view.roles.index',compact('roles'));
    }
    public function store(Request $request){


        $role=new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        foreach ($request->input('permissions') as $key => $value) {
            $role->attachPermission($value);
        }
        return redirect('role/index')->with('rolesucess','Role Added sucessfully');
    }

    public function show($id){
          $role=Role::find($id);
         $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();

        return view('admin-view.roles.show',compact('role','rolePermissions'));
    }


   public function edit($id){


       $roles = Role::find($id);
       $permissions = Permission::all();
       $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
           ->pluck('permission_role.permission_id','permission_role.permission_id')->all();
       return view('admin-view.roles.edit',compact('roles','permissions','rolePermissions'));
   }

   public function update(Request $request){



       $role = Role::find($request->id);
       $role->name=$request->input('name');
       $role->display_name = $request->input('display_name');
       $role->description = $request->input('description');
       $role->save();


       DB::table("permission_role")->where("permission_role.role_id",$request->id)->delete();


       foreach ($request->input('permissions') as $key => $value) {
           $role->attachPermission($value);
       }
        return redirect('/role/index');
   }



    public function destroy($id){
        DB::table("roles")->where('id',$id)->delete();
        return redirect('role/index')->with('roledelete','Role Delete sucessfully');

    }



}
