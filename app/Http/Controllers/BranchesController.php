<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    public function all(){
        $branches = DB::table("table_branches")->get();
//        var_dump($branches);die("a");
//        dd($branches);
        return view("branches.list",[
            "branches"=>$branches
        ]);
    }
    public function new(){
        return view("branches.create");
    }

    public function save(Request $request){
        // dùng để nhận dữ liệu gửi lên
//        $data = $request->all();
//        dd($data);
        $now = Carbon::now();
        $a= $request->get("address");
        $c= $request->get("city");
        $C= $request->get("country");
        $z= $request->get("zip_code");
        $p= $request->get("phone_number");
        DB::table("table_branches")->insert([
            "address"=>$a,
            "city"=>$c,
            "country"=>$C,
            "zip_code"=>$z,
            "phone_number"=>$p,
            "created_at"=>$now,
            "updated_at"=>$now,
        ]);
        return redirect()->to("branches");
    }

    public function edit($id){
        $cat = DB::table("table_branches")->where("id",$id)->first();//tra ve null neu k co
        if ($cat == null) return redirect()->to("branches");
        return view("branches.edit",[
           "cat"=>$cat,
        ]);
    }

    public function update(Request $request,$id){
        $cat = DB::table("table_branches")->where("id",$id)->first();
        if ($cat == null) return redirect()->to("branches");
        DB::table("table_branches")->where("id",$id)->update([
            "address"=>$request->get("address"),
            "city"=>$request->get("city"),
            "country"=>$request->get("country"),
            "zip_code"=>$request->get("zip_code"),
            "phone_number"=>$request->get("phone_number"),
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->to("branches");
    }
}
