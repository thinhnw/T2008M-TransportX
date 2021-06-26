@extends('adminlte::page')

@section('title', 'Packages')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>Edit Package</h1>
        </div>
        <div>
        </div>
    </div>
@stop

@section('content')
<div class="px-5 mt-5">
    <form action="/packages/{{$package->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col col-6 form-group">
                <label>Receiver's Name</label>
                <input
                    type="text"
                    value="{{ $package->receiver }}"
                    class="form-control"
                    placeholder="Enter the receiver's name"
                    name="receiver"
                    required
                />
            </div>
            <div class="col col-6 form-group">
                <label>Receiver's Address</label>
                <input
                    type="text"
                    value="{{ $package->receiver_address }}"
                    class="form-control"
                    placeholder="Enter the receiver's address"
                    name="receiver_address"
                    required
                />
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-6 form-group">
                <label>Width (cm)</label>
                <input
                    type="number"
                    value="{{ $package->width }}"
                    step="any"
                    class="form-control"
                    placeholder="Enter package witdh"
                    name="width"
                    required
                />
            </div>
            <div class="col col-6 form-group">
                <label>Length (cm)</label>
                <input
                    type="number"
                    value="{{ $package->length }}"
                    step="any"
                    class="form-control"
                    placeholder="Enter package length"
                    name="length"
                    required
                />
            </div>
            <div class="col col-6 form-group">
                <label>Height (cm)</label>
                <input
                    type="number"
                    value="{{ $package->height }}"
                    step="any"
                    class="form-control"
                    placeholder="Enter package height"
                    name="height"
                    required
                />
            </div>
            <div class="col col-6 form-group">
                <label>Weight (kg)</label>
                <input
                    type="number"
                    value="{{ $package->weight }}"
                    step="any"
                    class="form-control"
                    placeholder="Enter package weight"
                    name="weight"
                    required
                />
            </div>
            <div class="col col-6 mt-3">
                <button type="submit" class="btn btn-primary">Confirm package informations</button>
            </div>
        </div>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@php
    function formatID($id) {
        $result = "";
        while ($id >= 1) {
            $result = strval($id % 10) . $result;
            $id /= 10;
        }
        while (strlen($result) < 6)  {
            $result = "0" . $result;
        }
        return "PK" . $result;
    }
@endphp
