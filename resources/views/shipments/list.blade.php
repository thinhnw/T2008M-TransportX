@extends('adminlte::page')

@section('title', 'Shipments')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>All Shipments</h1>
        </div>
        <div>
            <button class="btn btn-primary" onclick="window.location='{{ url("/admin/shipments/create") }}'">+ Add Shipment</button>
        </div>
    </div>
@stop

@section('content')
<div class="px-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Status</th>
            <th scope="col">Driver</th>
            <th scope="col">Type</th>
            <th scope="col">Branch</th>
            <th scope="col">From Address</th>
            <th scope="col">To Address</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $index => $shipment)
                <tr class="cursor-pointer">
                    <th scope="row">{{ $index }}</th>
                    <td>{{ formatID($shipment->id) }}</td>
                    <td>{{ $shipment->status_in_text }}</td>
                    <td>
                        {{ $shipment->driver ? $shipment->driver->name : 'Unassigned' }}
                    </td>
                    <td>{{ $shipment->shipment_type }}</td>
                    <td>{{ $shipment->branch_id }}</td>
                    <td>{{ $shipment->from_address }}</td>
                    <td>{{ $shipment->to_address }}</td>
                    <td>{{ $shipment->from_date }}</td>
                    <td>{{ $shipment->to_date }}</td>
                    <td class="d-flex align-items-center">
                        <a href="/admin/shipments/{{$shipment->id}}" class="btn btn-light mr-1">
                            <i class="fas fa-eye text-primary"></i>
                        </a>
                        @if ($shipment->status != -1 && $shipment->status != 5)
                            <a href="/admin/shipments/{{$shipment->id}}/edit" class="btn btn-light mr-1" id="edit">
                                <i class="fas fa-edit btn-icon"></i>
                            </a>
                        @endif
                        <form method="POST" action="/admin/shipments/{{$shipment->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light delete-shipment">
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
    $('.delete-shipment').click(function(e){
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