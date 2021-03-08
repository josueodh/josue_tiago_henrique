@extends('layouts.master')

@section('title', 'Matéria '. $subject->name)
@section('content')

<div class="row">
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'success')
            @slot('value', $percentage_approved . ' %')
            @slot('title', 'Média de Aprovados')
            @slot('icon', 'fas fa-graduation-cap')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'info')
            @slot('value', $averageIRA)
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
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">IRA</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Aprovados/Reprovados</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="chart-line" height="112px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="chart-approved" height="112px"></canvas>
                </div>
            </div>
        </div>
    </div>
  </div>




@endsection
@push('scripts')
<script>
        var dataIRA = {!! json_encode($average) !!};
        var dataBonus = {!! json_encode($bonus) !!};
        var label = {!! json_encode($label) !!};
		var config = {
			type: 'line',
			data: {
				labels: label,
				datasets: [{
					label: 'IRA Médio',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: dataIRA,
					fill: false,
				}, {
					label: 'Bonificação',
					fill: false,
					backgroundColor: "rgb(54, 162, 235)",
					borderColor: "rgb(54, 162, 235)",
					data: dataBonus
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



        var dataApproved = {!! json_encode($approved) !!};
        var dataDisapproved = {!! json_encode($disapproved) !!};
        var label = {!! json_encode($label) !!};
		var configApproved = {
			type: 'line',
			data: {
				labels: label,
				datasets: [{
					label: 'Aprovados',
					backgroundColor: '#28a745',
					borderColor: '#28a745',
					data: dataApproved,
					fill: false,
				}, {
					label: 'Reprovados',
					fill: false,
					backgroundColor: "#dc3545",
					borderColor: "#dc3545",
					data: dataDisapproved
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
							labelString: '% total'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctxApproved = document.getElementById('chart-approved').getContext('2d');
			window.myLine = new Chart(ctxApproved, configApproved);
            var ctx = document.getElementById('chart-line').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
</script>
@endpush
