@extends('adminlte::page')

@section('title', 'Branches')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>Add New Branches</h1>
        </div>
        <div>
        </div>
    </div>
@stop

@section('content')
    <div class="px-5 mt-5">
        <form action="{{url("/branches/update",["id"=>$cat->id])}}" method="post">
            @csrf
            <div class="row">
                <div class="col col-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{$cat->address}}" placeholder="Enter address..." name="address" required />
                </div>
                <div class="col col-6 form-group">
                    <label>City</label>
                    <input type="text" class="form-control" value="{{$cat->city}}" placeholder="Enter City..." name="city" required />
                </div>
                <div class="col col-6 form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" value="{{$cat->country}}" placeholder="Enter Country..." name="country" required />
                </div>
                <div class="col col-6 form-group">
                    <label>Zip-Code</label>
                    <input type="text" class="form-control" value="{{$cat->zip_code}}" placeholder="Enter Zip-Code..." name="zip_code" required />
                </div>
                <div class="col col-6 form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" value="{{$cat->phone_number}}" placeholder="Enter Phone Number..." name="phone_number" required />
                </div>
                <div class="col col-6 mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
