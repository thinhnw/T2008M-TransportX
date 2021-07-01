@extends('adminlte::page')

@section('title', 'Edit Shipment')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>Edit Shipment #{{ $shipment->id }}</h1>
        </div>
        <div>
        </div>
    </div>
@stop

@section('content')
<div class="px-5 mt-3">
    <form action="/shipments/{{$shipment->id}}" method="POST" class="border p-3">
        @csrf
        @method('PATCH')
        <div class="d-flex mt-3 align-items-center">
            <b for="">Shipment Type</b>
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-primary ml-3 font-weight-normal" for="delivery">
                    <input type="radio" name="type" value="0" id="delivery" required checked="{{ false }}">
                    Delivery (door to door)
                </label>
                <label class="btn btn-outline-primary ml-3 font-weight-normal" for="pickup" >
                    <input type="radio" name="type" value="1" id="pickup">
                    Pickup (receiver pick up package at the closest branch)
                </label>
            </div>
        </div>
        <div class="d-flex mt-3 align-items-center">
            <div>
                <b>Assigned Driver</b>
            </div>
            <select class="custom-select w-25 ml-3" placeholder="Assign a driver" name="driver_id">
                @foreach ($users as $index => $user)
                    @if ($user->employee_type == 'driver')
                        <option value="{{ $user->id }}">{{ '#' . $user->id . ' ' .$user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <hr> 
        <div class="container-fluid">
            <div class="row">
                <div class="col col-6 form-group pl-0">
                    <label>Processing Branch</label>
                    <select class="custom-select" placeholder="Enter the starting branch" name="branch_id" required>
                        @foreach ($branches as $index => $branch)
                            @if ($branch->id != $shipment->branch_id)
                                <option value="{{ $branch->id }}">{{ fullAddress($branch) }}</option>
                            @else
                                <option selected value="{{ $branch->id }}">{{ fullAddress($branch) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-6 form-group pl-0">
                    <label for="from_address">From Address</label>
                    <input type="text" class="form-control" placeholder="Enter starting address" name="from_address" required value="{{ $shipment->from_address}}">
                </div>
                <div class="col col-6 form-group pr-0">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" class="form-control" required value="{{ $shipment->from_date }}"/>
                </div>
                <div class="col col-6 form-group pl-0">
                    <label for="to_address">To Address</label>
                    <input type="text" class="form-control" placeholder="Enter shipping address" name="to_address" required value="{{ $shipment->to_address }}"/>
                </div>
                <div class="col col-6 form-group pr-0">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" class="form-control" required value="{{ $shipment->to_date }}"/>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <b>Packages</b>
                <button type="button" class="btn btn-light rounded" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle text-danger"></i>    
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Package</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <select class="custom-select" placeholder="Select package" id="select-package">
                                    @foreach ($packages as $index => $package)
                                        @if ($package->shipment_id == null || $package->shipment_id == $shipment->id)
                                            <option value="{{ $package->id }}">{{ formatPackage($package) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="text-danger" id="select-package-error">This package has been selected already</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="confirm-package" >Confirm this package</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="hidden" name="packages" value="" required/>
                <section id="packages">

                </section>
            </div>
        </div>
            <hr>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary ">Save</button>
                <a href="/shipments" type="submit" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#select-package-error').hide()
        let shipmentId = {!! $shipment->id !!}
        let allPackages = {!! json_encode($packages) !!}
        let selectedPackages = []
        allPackages.forEach(pkg => {
            if (pkg.shipment_id === shipmentId) {
                selectedPackages.push(pkg.id)
                $("input[name=packages]").val(selectedPackages.join(', '));
                $('#packages').append(`<div class="btn bg-danger mr-3 p-2 mt-3"  id="package-${pkg.id}">${formatPackage(pkg.id)} <i class="fas fa-minus-circle"></i><div>`)
                $(`#package-${pkg.id}`).click(function(e) {
                    selectedPackages.splice(selectedPackages.indexOf(pkg.id));
                    $("input[name=packages]").val(selectedPackages.join(', '));
                    this.remove();
                })
            }
        })
        $('#select-package').change(function (e) {
            let pkgId = $('#select-package').children(":selected").attr("value")
            if (selectedPackages.includes(pkgId)) {
                $('#select-package-error').show()
                return
            } else {
                $('#select-package-error').hide()
            }
        });
        $('#confirm-package').click(function (e) {
            let pkgId = $('#select-package').children(":selected").attr("value")
            if (selectedPackages.includes(pkgId)) {
                $('#select-package-error').show()
                return
            } else {
                $('#select-package-error').hide()
            }
            selectedPackages.push(pkgId)
            $("input[name=packages]").val(selectedPackages.join(', '));
            $('#packages').append(`<div class="btn bg-danger mr-3 p-2 mt-3"  id="package-${pkgId}">${formatPackage(pkgId)} <i class="fas fa-minus-circle"></i><div>`)
            $(`#package-${pkgId}`).click(function(e) {
                selectedPackages.splice(selectedPackages.indexOf(pkgId));
                $("input[name=packages]").val(selectedPackages.join(', '));
                this.remove();
            })
            $('#exampleModal').modal('hide')
        })
        function formatPackage(id) {
            let result = "";
            while (id >= 1) {
                result = (id % 10).toString() + result;
                id = Math.floor(id / 10);
            }
            while (result.length < 6)  {
                result = "0" + result;
            }
            return "PK" + result;
        }
    </script>

@stop
@php
    function fullAddress($branch) {
        return 'Branch ' . $branch->id . ' (' . $branch->address . ', ' . $branch->city . ', ' . $branch->country . ')';
    }

    function formatPackage($package) {
        $result = "";
        $id = $package->id;
        while ($id >= 1) {
            $result = strval($id % 10) . $result;
            $id /= 10;
        }
        while (strlen($result) < 6)  {
            $result = "0" . $result;
        }
        return "PK" . $result . ' ' . $package->width . 'x' . $package->length . 'x'. $package->height . 'cm';
    }
@endphp