<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    function ListAll(){
        $list=User::paginate(10);
        return view('users.list_users',["list"=>$list]);
    }
    function Driver(){
        $list=DB::table("users")->where("employee_type","driver")->get();
        return view("users.driver",['list'=>$list]) ;
    }
    function Customer(){
        $list=DB::table("users")->where("employee_type","customer")->get();
        return view("users.driver",['list'=>$list]) ;    }
    function Edit($id){
        $user=User::findOrFail($id);
        return view('users.edit_user',['user'=>$user]);
    }
    function Update(Request $request,$id){
        try {
            $user = User::findOrFail($id);
            $user->update([
                "name" => $request->post("name"),
                "email" => $request->post('email'),
                'password' => bcrypt($request->post('password')),
                'user_branch' => $request->post('branch'),
                'employee_type' => $request->post('employee_type')
            ]);
            return redirect()->to('/users/list');
        }catch (\Exception $e){
            abort(403);
        }
    }
    function New_User(){
        return view('users.new_user', [ 'branches' => Branches::all() ]);
    }
    function Save(Request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'branch'=>'required',
            'employee_type'=>'required'
        ],[
            "name.required"=>"The name field is required",
            "password.required"=>"The name field is required",
            "email.required"=>"The name field is required",
            "branch.required"=>"Vui long chon the loai",
            "employee_type.required"=>"Vui long chon the loai nhan vien",
        ]);
        try {
            User::create([
                "name" => $request->post("name"),
                "email" => $request->post('email'),
                'password' => Hash::make($request->post("password")),
                'user_branch' => $request->post('branch'),
                'employee_type' => $request->post('employee_type')
            ]);
            return redirect()->to('/users/list');
        }catch (\Exception $e){
            abort(404);
        }
    }
    function Delete($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->to('/users/list');
        }catch (\Exception $e){
            abort(404);
        }
    }

}
