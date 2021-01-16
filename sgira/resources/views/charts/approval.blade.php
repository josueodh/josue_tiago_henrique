@extends('layouts.master')

@section('title', 'Aprovação')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="chart-line"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/charts/aproval.js') }}"></script>
