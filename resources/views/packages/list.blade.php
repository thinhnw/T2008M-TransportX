@extends('adminlte::page')

@section('title', 'Packages')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>All Packages</h1>
        </div>
        <div>
            <button class="btn btn-primary" onclick="window.location='{{ url("packages/create") }}'">+ Add Package</button>
        </div>
    </div>
@stop

@section('content')
<div class="px-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Reference Number</th>
            <th scope="col">Width (cm)</th>
            <th scope="col">Length (cm)</th>
            <th scope="col">Height (cm)</th>
            <th scope="col">Weight (kg)</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($packages as $index => $package)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->width }}</td>
                    <td>{{ $package->length }}</td>
                    <td>{{ $package->height }}</td>
                    <td>{{ $package->weight }}</td>
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
@stop