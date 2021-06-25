@extends('adminlte::page')

@section('title', 'Shipments')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>All Shipments</h1>
        </div>
        <div>
            <button class="btn btn-primary" onclick="window.location='{{ url("shipments/create") }}'">+ Add Shipment</button>
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
            <th scope="col">Type</th>
            <th scope="col">Branch</th>
            <th scope="col">Shipping Cost</th>
            <th scope="col">Shipping Date</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $index => $shipment)
                <tr class="cursor-pointer">
                    <th scope="row">{{ $index }}</th>
                    <td>{{ formatID($shipment->id) }}</td>
                    <td>New</td>
                    <td>0</td>
                    <td class="d-flex align-items-center">
                        <a href="/shipments/{{$shipment->id}}/edit" class="mr-3">Edit</a>
                        <form method="POST" action="/shipments/{{$shipment->id}}">
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