@extends('layouts.master')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Aluno')
        @slot('back', route('students.index'))
        @slot('form')
            @include('students.form')
            <hr>
            <h3>Gráfico IRA</h3>
            <hr>
            <div class="chart-container">
                <canvas id="chart-line" height="112px"></canvas>
            </div>
        @endslot
        @endslot
    @endcomponent

    @endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
        window.onload = function() {
            var ctx = document.getElementById('chart-line').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
        var dataIRA = {!! json_encode($ira) !!};
        var dataIRACourse = {!! json_encode($ira_all_students) !!};
        var label = {!! json_encode($label) !!};
		var config = {
			type: 'line',
			data: {
				labels: label,
				datasets: [{
					label: 'IRA Aluno',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: dataIRA,
					fill: false,
				}, {
					label: 'IRA Curso',
					fill: false,
					backgroundColor: "rgb(54, 162, 235)",
					borderColor: "rgb(54, 162, 235)",
					data: dataIRACourse
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
    </script>
@endpush
