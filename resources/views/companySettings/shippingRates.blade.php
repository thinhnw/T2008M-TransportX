@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex align-items-center">
	<h1>Shipping Rates (VND)</h1>
	<a href="{{url("/admin/settings/rate/edit")}}" class="btn btn-light ml-3">
		<i class="fas fa-edit text-primary"></i>
	</a>
</div>
@stop

@section('content')
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th scope="col" rowspan="2" class="align-middle">WEIGHT (Gram)</th>
				<th scope="col" rowspan="2" class="align-middle">INTRAPROVINCE</th>
				<th scope="col" colspan="3">INTER-REGION</th>
			</tr>
			<tr>
				<th scope="col">To 100km</th>
				<th scope="col">To 300km</th>
				<th scope="col">Above 300km</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Up to 100</td>
				<td>{{ $shippingRates->to100->intraprovince }}</td>
				<td>{{ $shippingRates->to100->to100km}}</td>
				<td>{{ $shippingRates->to100->to300km }}</td>
				<td>{{ $shippingRates->to100->above300km }}</td>
			</tr>
			<tr>
				<td>Above 50-500</td>
				<td>{{ $shippingRates->to500->intraprovince }}</td>
				<td>{{ $shippingRates->to500->to100km}}</td>
				<td>{{ $shippingRates->to500->to300km }}</td>
				<td>{{ $shippingRates->to500->above300km }}</td>
			</tr>
			<tr>
				<td>Above 500-1000</td>
				<td>{{ $shippingRates->to1000->intraprovince }}</td>
				<td>{{ $shippingRates->to1000->to100km}}</td>
				<td>{{ $shippingRates->to1000->to300km }}</td>
				<td>{{ $shippingRates->to1000->above300km }}</td>
			</tr>
			<tr>
				<td>Every subsequent 500</td>
				<td>{{ $shippingRates->every500->intraprovince }}</td>
				<td>{{ $shippingRates->every500->to100km}}</td>
				<td>{{ $shippingRates->every500->to300km }}</td>
				<td>{{ $shippingRates->every500->above300km }}</td>
			</tr>
		</tbody>
	</table>
	<div class="card">
		<div class="card-body">
		<p>
			Weight of package is the maximum of its actual weight and its dimensional weight
		</p>
		<p>
			Dimensional weight = H x W x L (cm) : 6000
		</p>	
		</div>
	</div>
@stop

@section('css')
@stop

@section('js')
@stop
