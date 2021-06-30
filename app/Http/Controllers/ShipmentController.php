<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Package;
use App\Models\Branches;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('shipments.list', [ "shipments" => Shipment::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches = Branches::all();
        return view('shipments.create', [ 'branches' => $branches, 'packages' => Package::all() ] );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $shipment = new Shipment;
        $shipment->type = $request->input('type');
        $shipment->from_branch_id = $request->input('from_branch_id');
        $shipment->from_date = $request->input('from_date');
        $shipment->to_date = $request->input('to_date');
        if ($shipment->type == 0) {
            $to_branch_id =  $request->input('to_branch_id');
            $shipment->to_branch_id = $to_branch_id;
            $branch = Branches::find($to_branch_id);
            $shipment->to_address = $branch->address;
        } else {
            $shipment->to_address = $request->input('to_address');
        }

        $shipment->save();
        return redirect()->action([ ShipmentController::class, 'index' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
