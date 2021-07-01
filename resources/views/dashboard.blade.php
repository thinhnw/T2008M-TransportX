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
        <div class="row mt-5">
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
        <div class="row mt-5">
            <div class="col">
                <div class="card p-3 text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>
                            Total Branches
                        </b>
                        <i class="fas fa-building"></i>
                    </div>
                    <h2>
                        {{ $branches->count() }}
                    </h2>
                </div>
            </div>
            <div class="col">
                <div class="card p-3 text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>
                            Total Employees
                        </b>
                        <i class="fas fa-users"></i>
                    </div>
                    <h2>
                        {{ $users->count() }}
                    </h2>
                </div>
            </div>
            <div class="col">
                <div class="card p-3 text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>
                            Total Packages
                        </b>
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h2>
                        {{ $packages->count() }}
                    </h2>
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
                    text: 'Number of Delivery/Pickup Shipments',
                    fontSize: 16,
                    fontColor: '#333',
                    padding: 16
                }
            }
        });
        var ctxBar = document.getElementById('bar').getContext('2d');
        var myChartBar = new Chart(ctxBar, {
            type: 'bar',
            data: {
             
                datasets: [
                    {
                        label: 'Newly created',
                        data: [ {!! $shipments->where('status', 0)->count() !!}],
                        backgroundColor: [
                        '#64b5f6',
                        ],
                        hoverOffset: 4
                    },

                    {
                        label: 'Packages gathered by branch',
                        data: [ {!! $shipments->where('status', 1)->count() !!}],
                        backgroundColor: [
                        '#4fc3f7',
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'Accepted by courier',
                        data: [ {!! $shipments->where('status', 2)->count() !!}],
                        backgroundColor: [
                        '#4dd0e1',
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'Shipping',
                        data: [ {!! $shipments->where('status', 3)->count() !!}],
                        backgroundColor: [
                        '#4db6ac',
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'Arrived at destination, waiting for receivers',
                        data: [ {!! $shipments->where('status', 4)->count() !!}],
                        backgroundColor: [
                        '#81c784',
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'Delivered',
                        data: [ {!! $shipments->where('status', 5)->count() !!}],
                        backgroundColor: [
                        '#aed581',
                        ],
                        hoverOffset: 4
                    },
                    {
                        label: 'Failed to be delivered',
                        data: [ {!! $shipments->where('status', -1)->count() !!}],
                        backgroundColor: [
                        '#f44336',
                        ],
                        hoverOffset: 4
                    },
                ],
            },
            options: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Number of Shipments by Status',
                    fontSize: 16,
                    fontColor: '#333',
                    padding: 16
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }
        });
    </script>
@stop

@section('plugins.Chartjs', true)
@php
@endphp

