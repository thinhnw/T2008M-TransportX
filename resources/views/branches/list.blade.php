@extends('adminlte::page')

@section('title', 'Branches')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>All Branches</h1>
        </div>
        <div>
            <button class="btn btn-primary" onclick="window.location='{{ url("branches/new") }}'">+ Add Branches</button>
        </div>
    </div>
@stop

@section('content')
    <div class="px-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Street/Building</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Zip Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col"></th>
                {{-- <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th> --}}
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $cat)
                <tr>
                    <td scope="col">{{$cat->id}}</td>
                    <td scope="col">{{$cat->address}}</td>
                    <td scope="col">{{$cat->city}}</td>
                    <td scope="col">{{$cat->country}}</td>
                    <td scope="col">{{$cat->zip_code}}</td>
                    <td scope="col">{{$cat->phone_number}}</td>
                    {{-- <td scope="col">{{$cat->created_at}}</th>
                    <td scope="col">{{$cat->updated_at}}</th> --}}
                    <th scope="col"><a href="{{url("/branches/edit",["id"=>$cat->id])}}">Edit</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
