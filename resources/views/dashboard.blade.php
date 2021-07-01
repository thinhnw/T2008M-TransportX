{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="d-flex align-items-center justify-content-center card">
                    <canvas id="doughnut" class="w-100"  height="350" ></canvas>
                </div>
            </div>
            <div class="col-8">
                <div class="d-flex align-items-center justify-content-center card">
                    <canvas id="bar" class="w-100"  height="350" ></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var ctxDoughnut = document.getElementById('doughnut').getContext('2d');
        let delivery = {!! $shipments->where('type', 0)->count() !!}
        let pickup = {!! $shipments->where('type', 1)->count() !!}
        var myChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: [
                    'Delivery',
                    'Pickup',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [ delivery, pickup],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }],
            },
            options: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: '#Delivery/Pickup Shipment',
                    fontSize: 16,
                    fontColor: 'black',
                    padding: 16
                }
            }
        });
        var ctxBar = document.getElementById('bar').getContext('2d');
        var myChartBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: [
                    'Delivery',
                    'Pickup',
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [ delivery, pickup],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }],
            },
            options: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: '#Delivery/Pickup Shipment',
                    fontSize: 16,
                    fontColor: 'black',
                    padding: 16
                }
            }
        });
    </script>
@stop

@section('plugins.Chartjs', true)
@php
@endphp

