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
                <tr class="cursor-pointer">
                    <td >{{$cat->id}}</td>
                    <td >{{$cat->address}}</td>
                    <td >{{$cat->city}}</td>
                    <td >{{$cat->country}}</td>
                    <td >{{$cat->zip_code}}</td>
                    <td >{{$cat->phone_number}}</td>
                    {{-- <td >{{$cat->created_at}}</td>
                    <td >{{$cat->updated_at}}</td> --}}
                    <td class="d-flex align-items-center">
                        <a href="{{url("/branches/edit",["id"=>$cat->id])}}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAABk0lEQVRIS82XjU3DMBBGv04ATACdAJgAmAS6AUwAG8AGwAhMAExAmQDYADZAD52ji4md2I7UnlRVUc/37j/uQhuSxYa42jrwrqTDgmy8S/o2fc7eSjqS9Cnpyr575oYivpB0XwB9lMQZBOizQYMJHDqTtPY2Y/CBpI+ZoF+S9s0W8GMfeQw+NY/RJ0U9LwcceklEGrLwIOncdNAl8j/JgVEKhnNJiNNLXZfuADZOYl4reKimMIh0ZbUP/fIqiYw2RxxDn8zwjkttAP3Yb13paiOOoaGmjBCpDXB8+AetrXEKGrJ4I+naHgahNeAxqN8BSWgpmDSyHIAjfnHwnIPyG93eTcnUGrdC6ezeeE4Bs83eKiPFYc4ixWC/zeL0jjWSP9sE9of9Okw10mzgS9vfNEt4I+W6dzZwvLOzI2PbiklorrEHj0HRbYqYuaU7Y2Eu+eSkCTxie35waKQWMJm6m1Lj0qtPiVN77kI4eL0tvexNgXMpYO47Sd2rUw01BRLr8PIPV99RcA2g6MzW/ZMo8r5G+RfGLJYf4pPcVQAAAABJRU5ErkJggg=="/></a>
                    <button type="submit" class="btn btn-light delete-package">
                        <a href="{{url("/branches/list/delete",['id'=>$cat->id])}}">
                            <i class="fas fa-minus-circle text-danger"></i>
                        </a>
                    </button>
                        <button type="button" class="btn btn-info btn-flat view_parcel" data-id="6">
                            <a href="{{url("/branches/info",["id"=>$cat->id])}}">
                                <i style="color: #fff" class="fas fa-eye"></i>
                            </a>
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
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
@stop
