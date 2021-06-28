@extends('adminlte::page')

@section('title', 'New Shipment')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
        <div>
            <h1>Create New Shipment</h1>
        </div>
        <div>
        </div>
    </div>
@stop

@section('content')
<div class="px-5 mt-3">
    <form action="/shipment" method="POST" class="border p-3">
        @csrf
        <div class="border-bottom">
            <h4>Shipment Info</h4> 
        </div>
        <div class="d-flex mt-3 align-items-center">
            <b for="">Shipment Type</b>
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-primary ml-5 font-weight-normal" for="delivery">
                    <input type="radio" name="type" value="delivery" id="delivery">
                    Delivery (door to door)
                </label>
                <label class="btn btn-outline-primary ml-5 font-weight-normal" for="pickup">
                    <input type="radio" name="type" value="pickup" id="pickup">
                    Pickup (receiver pick up package at the closest branch)
                </label>
            </div>
        </div>
        <hr> 
        <div class=" container-fluid">
            <div class="row">
                <div class="col col-6 form-group pl-0">
                    <label>From Branch</label>
                    <select class="custom-select" placeholder="Enter the starting branch">
                        @foreach ($branches as $index => $branch)
                            <option value="{{ $branch->id }}">{{ fullAddress($branch) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-6 form-group pr-0">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" class="form-control" />
                </div>
                <div class="col col-6 form-group pl-0 if-pickup">
                    <label>To Branch</label>
                    <select class="custom-select" placeholder="Enter the receiving branch">
                        @foreach ($branches as $index => $branch)
                            <option value="{{ $branch->id }}">{{ fullAddress($branch) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-6 form-group pl-0 if-delivery">
                    <label for="receiver_address">Shipping Address</label>
                    <input type="text" class="form-control" placeholder="Enter shipping address">
                </div>
                <div class="col col-6 form-group pr-0">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" class="form-control" />
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
                                        <option value="{{ $package->id }}">{{ formatPackage($package) }}</option>
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
                <input type="hidden" name="packages" value="" />
                <section id="packages">

                </section>
            </div>
        </div>
            <hr>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg">Create</button>
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
        $('.if-delivery').hide()
        $('#select-package-error').hide()

        $('#delivery').click(function (e) {
            if ($(this).is(':checked')) {
                $('.if-delivery').show()
                $('.if-pickup').hide()
            }
        })
        $('#pickup').click(function (e) {
            if ($(this).is(':checked')) {
                $('.if-pickup').show()
                $('.if-delivery').hide()
            }
        })
        let allPackages = {!! json_encode($packages) !!}
        let selectedPackages = []
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
            $('#packages').append(`<div class="badge rounded-pill bg-danger mr-3 p-2 mt-3">${formatPackage(pkgId)}<div>`)
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
        console.log({!!json_encode($packages)!!});
    </script>

@stop
@php
    function fullAddress($branch) {
        return $branch->address . ', ' . $branch->city . ', ' . $branch->country;
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