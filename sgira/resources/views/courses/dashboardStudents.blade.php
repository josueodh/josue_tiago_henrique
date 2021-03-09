@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-8">
        <h2>Dashboard - {{ Auth::user()->name }}</h2>
    </div>
    <div class="col-4">
        <a class="btn btn-dark float-right" href="{{ route('iraGoal.edit') }}">Editar Meta</a>
    </div>
</div>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'success')
                @slot('value', Auth::user()->ira)
                @slot('title', 'IRA')
                @slot('icon', 'fas fa-graduation-cap')
            @endcomponent
        </div>
        <div class="col-md-4 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'info')
                @slot('value', Auth::user()->course->average_ira)
                @slot('title', 'IRA do Curso')
                @slot('icon', 'fas fa-calculator')
            @endcomponent
        </div>

        <div class="col-md-4 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'warning')
                @slot('value', Auth::user()->bonifications()->count())
                @slot('title', 'Bonificações ganhas')
                @slot('icon', 'fas fa-gift')
            @endcomponent
        </div>
        <div class="col-md-6 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'danger')
                @slot('value', Auth::user()->iraGoal)
                @slot('title', 'Meta IRA')
                @slot('icon', 'fas fa-chart-line')
            @endcomponent
        </div>
        <div class="col-md-6 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'success')
                @slot('value', Auth::user()->required_grade)
                @slot('title', 'Nota necessária')
                @slot('icon', 'fas fa-bullseye')
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            @component('components.index')
                @slot('title', 'Top 3')
                @slot('header')
                    <tr class="text-center">
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>IRA</th>
                    </tr>
                @endslot
                @slot('body')
                    <tr class="text-center">
                        <td>1 <i class="fas fa-medal" style="color: #D7BE69"></i></td>
                        <td>{{Auth::user()->course->top1->id  == Auth::user()->id ? Auth::user()->name : '---'}}</td>
                        <td>{{Auth::user()->course->top1->ira }}</td>
                    </tr>
                    @if(Auth::user()->course->top2)
                        <tr class="text-center">
                            <td>2 <i class="fas fa-medal" style="color: #c0c0c0"></i></td>
                            <td>{{Auth::user()->course->top2->id  == Auth::user()->id ? Auth::user()->name : '---'}}</td>
                            <td>{{Auth::user()->course->top2->ira }}</td>
                        </tr>
                    @endif
                    @if(Auth::user()->course->top3)
                        <tr class="text-center">
                            <td>3 <i class="fas fa-medal" style="color: #cd7f32"></i></td>
                            <td>{{Auth::user()->course->top3->id  == Auth::user()->id ? Auth::user()->name : '---'}}</td>
                            <td>{{Auth::user()->course->top3->ira }}</td>
                        </tr>
                    @endif
                @endslot
            @endcomponent
        </div>
        <div class="col-md-6 col-sm-12">
            @component('components.index')
                @slot('title', 'Ganhando Bonificação')
                @slot('header')
                    <tr class="text-center">
                        <th>Matéria</th>
                        <th>Nota</th>
                        <th>Meta</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach(Auth::user()->winBonus as $team)
                    <tr class="text-center">
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->actual_grade}}</td>
                        <td>{{ $team->rule}}</td>
                    </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
