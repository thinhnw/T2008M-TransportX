@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
	<div class="d-flex align-items-center">
		<h1>Shipping Rates (VND)</h1>
	</div>
@stop

@section('content')
<form action="/admin/settings/rate/edit" method="POST">
	@csrf
	@method('PATCH')
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
				<td>
					<input type="number" step="100"  min="0" name="to100_intraprovince" value="{{ $shippingRates->to100->intraprovince }}" class="form-control">
				</td>
				<td>
					<input type="number" step="100"  min="0" name="to100_to100km" value="{{ $shippingRates->to100->to100km}}" class="form-control">
				</td>
				<td>
					<input type="number" step="100"  min="0" name="to100_to300km" value="{{ $shippingRates->to100->to300km }}" class="form-control">
				</td>
				<td>
					<input type="number" step="100"  min="0" name="to100_above300km" value="{{ $shippingRates->to100->above300km }}" class="form-control">
				</td>
			</tr>
			<tr>
				<td>Above 50-500</td>
				<td>
					<input type="number"  min="0" name="to500_intraprovince" value="{{ $shippingRates->to500->intraprovince }}" step="100" class="form-control" required>
				</td>
				<td>
					<input type="number"  min="0" name="to500_to100km" value="{{ $shippingRates->to500->to100km}}" step="100" class="form-control" required>
				</td>
				<td>
					<input type="number"  min="0" name="to500_to300km" value="{{ $shippingRates->to500->to300km }}" step="100" class="form-control" required>
				</td>
				<td>
					<input type="number" name="to500_above300km" value="{{ $shippingRates->to500->above300km }}" step="100" class="form-control" required>
				</td>
			</tr>
			<tr>
				<td>Above 500-1000</td>
				<td>
					<input type="number"  min="0" name="to1000_intraprovince" value="{{ $shippingRates->to1000->intraprovince }}" required class="form-control" step="100">
				</td>
				<td>
					<input type="number"  min="0" name="to1000_to100km" value="{{ $shippingRates->to1000->to100km}}" required class="form-control" step="100">
				</td>
				<td>
					<input type="number"  min="0" name="to1000_to300km" value="{{ $shippingRates->to1000->to300km }}" required class="form-control" step="100">
				</td>
				<td>
					<input type="number"  min="0" name="to1000_above300km" value="{{ $shippingRates->to1000->above300km }}" required class="form-control" step="100">
				</td>
			</tr>
			<tr>
				<td>Every subsequent 500</td>
				<td>
					<input type="number"  min="0" step="100" name="every500_intraprovince" value="{{ $shippingRates->every500->intraprovince }}" required class="form-control">
				</td>
				<td>
					<input type="number"  min="0" step="100" name="every500_to100km" value="{{ $shippingRates->every500->to100km}}" required class="form-control">
				</td>
				<td>
					<input type="number"  min="0" step="100" name="every500_to300km" value="{{ $shippingRates->every500->to300km}}" required class="form-control">
				</td>
				<td>
					<input type="number"  min="0" step="100" name="every500_above300km" value="{{ $shippingRates->every500->above300km }}" required class="form-control">
				</td>
			</tr>
		</tbody>
	</table>
	<button type="submit" class="btn btn-primary ml-3">Save</button>
	<a href="/admin/settings/rate" type="button" class="btn btn-secondary ml-3">Cancel</a>
</form>
	
@stop

@section('css')
@stop

@section('js')
@stop
