<?php

namespace App\Http\Controllers;

use App\Models\Branches;
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
}
