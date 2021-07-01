<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ShipmentComponent;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Package;
use App\Models\User;
use App\Models\Branches;
use App\Models\ShipmentTrack;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

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
        $request->validate([
            'type'=>'required',
            'branch_id'=>'required',
            'from_date'=>'required',
            'from_address'=>'required',
            'to_address'=>'required',
            'to_date'=>'required',
            'packages'=>'required'
        ],[
            "type.required"=>"The name field is required",
            "branch_id.required"=>"The branch field is required",
            "from_date.required"=>"The from date field is required",
            "from_address.required"=>"The from address field is required",
            "to_address.required"=>"The to address field is required",
            "to_date.required"=>"The to date field is required",
            "packages.required"=>"The packages field is required",
        ]);
        $shipment = new Shipment;
        $shipment->type = $request->input('type');
        $shipment->branch_id  = $request->input('branch_id');
        $shipment->from_date = $request->input('from_date');
        $shipment->from_address = $request->input('from_address');
        $shipment->to_date = $request->input('to_date');
        $shipment->to_address = $request->input('to_address');
        try {
            $shipment->save();
            $shipment->packages()->saveMany(array_map(
                function($id) {
                    return Package::find(intval($id));
                }, explode(',', $request->input('packages'))
            ));

            $track = new ShipmentTrack;
            $track->status = 0;
            $shipment->shipment_tracks()->save($track);
        }catch (\Exception $e){
            abort(404);
        }
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
        return view('shipments.show', [ "shipment" => Shipment::find($id), "branches" => Branches::all(), "packages" => Package::all() ]);
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
        return view('shipments.edit', [ "shipment" => Shipment::find($id), 'branches' => Branches::all(), 'packages' => Package::all(), 'users' => User::all() ] );
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
        $request->validate([
            'type'=>'required',
            'branch_id'=>'required',
            'from_date'=>'required',
            'from_address'=>'required',
            'to_address'=>'required',
            'to_date'=>'required',
            'driver_id'=>'required'
        ],[
            "type.required"=>"The name field is required",
            "branch_id.required"=>"The branch field is required",
            "from_date.required"=>"The from date field is required",
            "from_address.required"=>"The from address field is required",
            "to_address.required"=>"The to address field is required",
            "to_date.required"=>"The to date field is required",
            "driver_id.required"=>"The driver id field is required",
        ]);
        try {
            $shipment = Shipment::find($id);
            if (!$request->input('status_code')) {
                $shipment->update([
                    'type' => $request->input('type'),
                    'branch_id'  => $request->input('branch_id'),
                    'from_date' => $request->input('from_date'),
                    'from_address' => $request->input('from_address'),
                    'to_date' => $request->input('to_date'),
                    'to_address' => $request->input('to_address')
                ]);
                $shipment->packages()->update([
                    'shipment_id' => null
                ]);
                if ($request->input('packages')) {
                    $shipment->packages()->saveMany(array_map(
                        function($id) {
                            return Package::find(intval($id));
                        }, explode(',', $request->input('packages'))
                    ));
                }
                $shipment->driver()->associate(User::find(intval($request->input('driver_id'))));
                $shipment->save();
                
            } else {
                $track = new ShipmentTrack;
                $track->status = $request->input('status_code');
                $shipment->shipment_tracks()->save($track);
            }
            return redirect()->action([ ShipmentController::class, 'index' ]);
        }catch (\Exception $e){
            // var_dump($e->getMessage());
            return $e;
            return redirect()->action([ ShipmentController::class, 'index' ]);
        }
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
        $shipment = Shipment::find($id);
        $shipment->delete();
        return redirect()->action([ShipmentController::class, 'index']);
    }

}
