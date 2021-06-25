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
            <th scope="col">Status</th>
            <th scope="col">Processed by branch</th>
            <th scope="col">Remove package</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($packages as $index => $package)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ formatID($package->id) }}</td>
                    <td>{{ $package->width }}</td>
                    <td>{{ $package->length }}</td>
                    <td>{{ $package->height }}</td>
                    <td>{{ $package->weight }}</td>
                    <td>New</td>
                    <td>0</td>
                    <td>
                        <form method="POST" action="/packages/{{$package->id}}">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="submit" class="btn btn-danger delete-pacakge" value="Delete user"> --}}
                            <button type="submit" class="btn btn-light">
                                <i class="fas fa-minus-circle text-danger"></i>
                            </button>
                        </form>
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
    <script>
    $('.delete-package').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
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
        return "SH" . $result;
    }
@endphp