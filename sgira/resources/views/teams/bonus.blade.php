@extends('layouts.master')

@section('title', 'Matéria ' . $team->name . ' - ' . $team->yearAndSemester)

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'danger')
                @slot('value', collect($team->noBonusStudents)->count())
                @slot('title', 'Nota menor que 80')
                @slot('icon', 'far fa-frown')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'success')
                @slot('value', collect($team->bonusStudents)->count())
                @slot('title', 'Nota maior que 80')
                @slot('icon', 'fas fa-graduation-cap')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'info')
                @slot('value', $team->average_ira)
                @slot('title', 'IRA da Matéria')
                @slot('icon', 'fas fa-calculator')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'warning')
                @slot('value', $team->rule ?? 0)
                @slot('title', 'Nota bonificação')
                @slot('icon', 'fas fa-book-reader')
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            @component('components.index')
                @slot('title', 'Acima da nota mínima')
                @slot('header')
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Nota</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($team->bonusStudents as $key => $student)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <th>{{ $student->name }}</th>
                            <th>{{ $student->total_grade }}</th>
                        </td>
                    @endforeach
                @endslot
            @endcomponent
        </div>
        <div class="col-md-6 col-sm-12">
            @component('components.index')
                @slot('title', 'Abaixo da nota mínima')
                @slot('header')
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Nota</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($team->noBonusStudents as $key => $student)
                        <tr>
                            <th>{{ $key + 1 + collect($team->bonusStudents)->count() }}</th>
                            <th>{{ $student->name }}</th>
                            <th>{{ $student->total_grade }}</th>
                        </td>
                    @endforeach

                @endslot
            @endcomponent
        </div>
    </div>
@endsection
