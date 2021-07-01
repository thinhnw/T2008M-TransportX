<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    public function all(){
        $branches = Branches::all();
        return view("branches.list",[
            "branches"=>$branches
        ]);
    }
    public function new(){
        return view("branches.create");
    }

    public function save(Request $request){
        $now = Carbon::now();
        $a= $request->get("address");
        $c= $request->get("city");
        $C= $request->get("country");
        $z= $request->get("zip_code");
        $p= $request->get("phone_number");
        Branches::create([
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
        $cat = Branches::findOrFail($id);
        return view("branches.edit",[
           "cat"=>$cat,
        ]);
    }

    public function update(Request $request,$id){
        $cat = Branches::findOrFail($id);
        $cat->update([
            "address"=>$request->get("address"),
            "city"=>$request->get("city"),
            "country"=>$request->get("country"),
            "zip_code"=>$request->get("zip_code"),
            "phone_number"=>$request->get("phone_number"),
            "updated_at"=>Carbon::now()
        ]);
        return redirect()->to("branches");
    }

    public function delete($id)
    {
        $cat = Branches::findOrFail($id);
        try {
            $cat->delete();
            return redirect()->to("branches");

        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function info($id){
        $cat = Branches::findOrFail($id);
        return view("branches.info",[
            "cat"=>$cat,
        ]);
    }
}
