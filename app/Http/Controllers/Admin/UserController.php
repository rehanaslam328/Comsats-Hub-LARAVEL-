<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use DB;
use Hash;

class UserController extends Controller
{
    //
    public function create(){

        $roles = Role::all();
        return view('admin-view.users.create',compact('roles'));
    }
    public function  index(){
       $users=User::all();
        return view('admin-view.users.index',compact('users'));

    }
    public function store(Request $request){

          $input = $request->all();
        $input['password'] = Hash::make($input['password']);


         $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect('user/index')->with('usersucess','User Added sucessfully');
    }

    public function show($id){
       $user = User::find($id);
        $userroles = Role::join("role_user","role_user.role_id","=","roles.id")
            ->where("role_user.user_id",$id)
            ->get();
        return view('admin-view.users.show',compact('user','userroles'));
    }


    public function edit($id){


          $user = User::find($id);

         $userDepartment= $user->department;

          $roles = Role::all();
         $userRoles = Role::join("role_user","role_user.role_id","=","roles.id")
            ->where("role_user.user_id",$id)
            ->get()->toArray();

        return view('admin-view.users.edit',compact('user','roles','userRoles','userDepartment'));

    }
    public function  update(Request $request){


         $input = $request->all();
        $user = User::find($request->id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$request->id)->delete();
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect('user/index')->with('usersucess','User Updated sucessfully');

    }
    public function destroy($id){


      DB::table("users")->where('id',$id)->delete();
       return redirect('user/index');
    }
}
