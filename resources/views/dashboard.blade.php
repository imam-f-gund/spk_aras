@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
