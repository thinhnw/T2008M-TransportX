<?php

namespace App\Http\Controllers;

use App\Http\Livewire\ShipmentComponent;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Package;
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
        $shipment = new Shipment;
        $shipment->type = $request->input('type');
        $shipment->branch_id  = $request->input('branch_id');
        $shipment->from_date = $request->input('from_date');
        $shipment->from_address = $request->input('from_address');
        $shipment->to_date = $request->input('to_date');
        $shipment->to_address = $request->input('to_address');
        $shipment->save();
        $shipment->packages()->saveMany(array_map(
            function($id) {
                return Package::find(intval($id));
            }, explode(',', $request->input('packages'))
        ));

        $track = new ShipmentTrack;
        $track->status = 0;
        $shipment->shipment_tracks()->save($track);
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
        return view('shipments.edit', [ "shipment" => Shipment::find($id), 'branches' => Branches::all(), 'packages' => Package::all() ] );
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
            $shipment->packages()->saveMany(array_map(
                function($id) {
                    return Package::find(intval($id));
                }, explode(',', $request->input('packages'))
            ));

        } else {
            $track = new ShipmentTrack;
            $track->status = $request->input('status_code');
            $shipment->shipment_tracks()->save($track);
        }
        return redirect()->action([ ShipmentController::class, 'index' ]);
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
