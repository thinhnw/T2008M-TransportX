<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Package;
use App\Models\Branches;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\Paginator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Paginator::useBootstrap();
        return view('packages.list', [ "packages" => Package::paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('packages.create', [ "packages" => Package::all(), "branches" => Branches::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package;
        $package->width = $request->input('width');
        $package->length = $request->input('length');
        $package->height = $request->input('height');
        $package->weight = $request->input('weight');
        $package->branch_id = $request->input('branch_id');
        $package->receiver = $request->input('receiver');
        $package->receiver_address = $request->input('receiver_address');

        $package->save();
        return redirect()->action([PackageController::class, 'index']);
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
        return view('packages.edit', [ "package" => Package::find($id) ]);
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
        $package = Package::find($id);
        $package->update([
            "width" => $request->input('width'),
            'length' => $request->input('length'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
        ]);

        return redirect()->action([PackageController::class, 'index']);
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
        $package = Package::find($id);
        $package->delete();
        return redirect()->action([PackageController::class, 'index']);
    }
}
