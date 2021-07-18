@extends('adminlte::page')

@section('title', 'New Shipment')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div class="d-flex">
            <h1>Shipment {{ formatId($shipment->id) }}</h1>
            @if ($shipment->status != -1 && $shipment->status != 5)
                <a href="/admin/shipments/{{$shipment->id}}/edit" class="btn btn-light ml-3" id="edit">
                    <i class="fas fa-edit btn-icon"></i>
                </a>
            @endif
        </div> 
        <div>
        </div>
    </div>
@stop

@section('content')
<div class="px-5 mt-3">
        <div class="d-flex align-items-center">
            <b>Status</b>
            <span class="text-info ml-3">
                {{ $shipment->status_in_text }}
            </span>
            @if ($shipment->status != 5 && $shipment->status != -1)
                <form action="/admin/shipments/{{$shipment->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status_code" value="{{ $shipment->status + 1 }}">
                    <button class="btn btn-success btn-sm ml-3">
                        <i class="fas fa-check-circle "></i>
                        Next step
                    </button>
                </form>
                <form action="/admin/shipments/{{$shipment->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status_code" value="{{ -1 }}">
                    <button class="btn btn-danger ml-3 btn-sm">
                        <i class="fas fa-times-circle "></i>
                        Cancel shipment
                    </button>
                </form>
            @endif
        </div>
        <div class="d-flex mt-3 align-items-center">
            <b class="btn-icon">Shipment Type</b>
            <span class="ml-3 text-info" id="field-part">{{ $shipment->shipment_type }}</span>
        </div>
        <div class="d-flex mt-3 align-items-center">
            <b class="btn-icon">Driver</b>
            <span class="ml-3 text-primary underline" id="field-part">
                {{
                    $shipment->driver_id ? '#' . $shipment->driver_id . ' ' . $shipment->driver->name : 'Unassigned'
                }}
            </span>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col col-6 form-group pl-0">
                    <label>Processing Branch</label>
                    <span class="ml-3 text-info" id="field-branch">{{ fullAddress($shipment->branch) }}</span>
                </div>
            </div>
        </div>
            <div class="d-flex">
                <div class="pl-0">
                    <label for="from_address">From Address</label>
                    <p class="text-info">
                        {{ $shipment->from_address }}
                    </p>
                </div>
                <div class=" ml-5">
                    <label for="from_date">From Date</label>
                    <p class="text-info">
                        {{ $shipment->from_date }}
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <div class="">
                    <label for="to_address">To Address</label>
                    <p class="text-info">
                        {{ $shipment->to_address }}
                    </p>
                </div>
                <div class="ml-5">
                    <label for="to_date">To Date</label>
                    <p class="text-info">
                        {{ $shipment->to_date }}
                    </p>
                </div>
            </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <b class="mb-3">Packages</b>
                <br>
                @foreach ($shipment->packages as $package )
                <a href="/packages/{{$package->id}}" class="btn btn-success px-2 py-1 mr-3 mt-3">
                    {{ formatPackage($package) }} 
                </a>
                @endforeach
            </div>
        </div>
    </form>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
@php
    function fullAddress($branch) {
        return 'Branch ' . $branch->id . ' (' . $branch->address . ', ' . $branch->city . ', ' . $branch->country . ')';
    }

    function formatPackage($package) {
        $result = "";
        $id = $package->id;
        while ($id >= 1) {
            $result = strval($id % 10) . $result;
            $id /= 10;
        }
        while (strlen($result) < 6)  {
            $result = "0" . $result;
        }
        return "PK" . $result . ' (' . $package->width . 'x' . $package->length . 'x'. $package->height . 'cm)';
    }
    function formatID($id) {
        $result = "";
        while ($id >= 1) {
            $result = strval($id % 10) . $result;
            $id /= 10;
        }
        while (strlen($result) < 6)  {
            $result = "0" . $result;
        }
        return "SH" . $result;
    }
@endphp