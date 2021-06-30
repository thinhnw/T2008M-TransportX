@extends('adminlte::page')

@section('title', 'Branches')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>BranChes Info</h1>
        </div>
        <div>
        </div>
    </div>
@stop
@section('content')
    <div class="px-5 mt-5">
        <form action="{{url("/branches/info",["id"=>$cat->id])}}" method="get">
            @csrf
            <div class="row">
                <div class="col col-6 form-group">
                    <label>Address</label>
                    <span type="text" class="form-control" value="{{$cat->address}}" placeholder="Enter address..." name="address"/>
                </div>
                <div class="col col-6 form-group">
                    <label>City</label>
                    <span type="text" class="form-control" value="{{$cat->city}}" placeholder="Enter City..." name="city" />
                </div>
                <div class="col col-6 form-group">
                    <label>Country</label>
                    <span type="text" class="form-control" value="{{$cat->country}}" placeholder="Enter Country..." name="country"/>
                </div>
                <div class="col col-6 form-group">
                    <label>Zip-Code</label>
                    <span type="text" class="form-control" value="{{$cat->zip_code}}" placeholder="Enter Zip-Code..." name="zip_code"/>
                </div>
                <div class="col col-6 form-group">
                    <label>Phone Number</label>
                    <span type="text" class="form-control" value="{{$cat->phone_number}}" placeholder="Enter Phone Number..."/>
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
