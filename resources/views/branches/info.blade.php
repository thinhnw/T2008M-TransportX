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
                    <span type="text" class="form-control"  placeholder="Enter address..." name="address"/>{{$cat->address}}</span>
                </div>
                <div class="col col-6 form-group">
                    <label>City</label>
                    <span type="text" class="form-control"  placeholder="Enter City..." name="city"/>{{$cat->city}}</span>
                </div>
                <div class="col col-6 form-group">
                    <label>Country</label>
                    <span type="text" class="form-control" placeholder="Enter Country..." name="country"/>{{$cat->country}}</span>
                </div>
                <div class="col col-6 form-group">
                    <label>Zip-Code</label>
                    <span type="text" class="form-control" placeholder="Enter Zip-Code..." name="zip_code"/>{{$cat->zip_code}}</span>
                </div>
                <div class="col col-6 form-group">
                    <label>Phone Number</label>
                    <span type="text" class="form-control" placeholder="Enter Phone Number..."/>{{$cat->phone_number}}</span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" style="margin-left: 45%" class="btn btn-primary">
                    <a style="color: #fff" href="{{url("/branches")}}">Back</a>
                </button>
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
