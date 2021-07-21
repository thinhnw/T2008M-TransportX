@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>All Drivers</h1>
@stop

@section('content')
    <div class="table-responsive">
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Branch</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $user)
                <tr>
                    <th scope="row">{{($user->id)-1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_branch}}</td>
                    <td>
                            <a href="{{url("/admin/users/list/edit",['id'=>$user->id])}}" class="btn btn-light">
                                <i class="fas fa-edit btn-icon text-primary"></i>
                            </a>
                       
                            <a href="{{url("/admin/users/list/delete",['id'=>$user->id])}}" class="btn btn-light">
                                <i class="fas fa-minus-circle btn-icon text-danger"></i>
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@stop
