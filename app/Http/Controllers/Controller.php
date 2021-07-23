<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function listBranchData(){
        $listbranch=Branches::all();
        return response()->json([
            "status"=>true,
            "message"=>"Success",
            "listbranch"=>$listbranch
        ]);
    }
    public function shippingRates()
    {
        //
        return response()->json([
           "status" => true,
           "message" => "Success",
           "data" => json_decode(CompanySetting::where("name", "shipping_rate")->first()->settings)
        ]);
    }
    public function bookShipment(Request $request) {
        dd($request->data);
        return [];
    }
}
