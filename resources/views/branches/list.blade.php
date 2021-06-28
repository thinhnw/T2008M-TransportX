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
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Zip Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $cat)
                <tr class="cursor-pointer">
                    <td >{{$cat->id}}</td>
                    <td >{{$cat->address}}</td>
                    <td >{{$cat->city}}</td>
                    <td >{{$cat->country}}</td>
                    <td >{{$cat->zip_code}}</td>
                    <td >{{$cat->phone_number}}</td>
                    <td >{{$cat->created_at}}</td>
                    <td >{{$cat->updated_at}}</td>
                    <td class="d-flex align-items-center">
                        <a href="{{url("/branches/edit",["id"=>$cat->id])}}">Edit</a>
                    <button type="submit" class="btn btn-light delete-package">
                        <i class="fas fa-minus-circle text-danger"></i>
                    </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
