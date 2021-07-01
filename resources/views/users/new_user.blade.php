@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Add New Employee</h1>
@stop

@section('content')
    <form action="{{url("/users/save")}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
                @error('name')<div class="alert alert-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group col-md-6">
                <label >Password</label>
                <input type="password" name="password" class="form-control"  placeholder="Password">
                @error('password')<div class="alert alert-danger">{{$message}}</div>@enderror

            </div>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
            @error('email')<div class="alert alert-danger">{{$message}}</div>@enderror

        </div>
        <div class="form-group">
            <label for="inputAddress2">Branch</label>
            <select id="inputState" name="branch" class="form-control">
                <option disabled value selected>Choose Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->full_address }}</option>
                @endforeach
            </select>
            @error('branch')<div class="alert alert-danger">{{$message}}</div>@enderror

        </div>
        <div class="form-group">
            <label for="">Employee Type</label>
            <br>
            <input type="radio" id="driver" name="employee_type" value="driver">
            <label for="html">Driver</label>
            {{-- <input type="radio" id="customer" name="employee_type" value="customer">
            <label for="css">Customer</label> --}}
            @error('employee_type')<div class="alert alert-danger">{{$message}}</div>@enderror

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@stop
