@extends('layouts.master')

@section('title', 'Matéria X')
@section('content')

<div class="row">
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'success')
            @slot('value', '83%')
            @slot('title', 'Média de Aprovados')
            @slot('icon', 'fas fa-graduation-cap')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'info')
            @slot('value', '70,8')
            @slot('title', 'IRA médio')
            @slot('icon', 'fas fa-calculator')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'warning')
            @slot('value', '80')
            @slot('title', 'Nota mínima para bonificação')
            @slot('icon', 'fas fa-book-reader')
        @endcomponent
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <div class="chart-container">
                <canvas id="chart-line" height="112px"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
		var config = {
			type: 'line',
			data: {
				labels: ['2018.1', '2018.3', '2019.1', '2019.3', '2020.1', '2020.3'],
				datasets: [{
					label: 'IRA Médio',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: [
						'63',
						'69',
						'75',
						'80',
						'70',
						'68',
					],
					fill: false,
				}, {
					label: 'Bonificação',
					fill: false,
					backgroundColor: "rgb(54, 162, 235)",
					borderColor: "rgb(54, 162, 235)",
					data: [
						'80',
                        '75',
                        '81',
                        '92',
                        '82',
                        '80'
					],
				}]
			},
			options: {
				responsive: true,
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Períodos'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Valor'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-line').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
</script>
@endpush
