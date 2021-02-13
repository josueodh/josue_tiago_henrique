@extends('layouts.master')

@section('title', 'Matéria X - 2020.1')
@php
    $canReceived = ['Joao', 'Lara', 'Francisco', 'Lucas', 'Larissa', 'Marcos'];
    $canotReceived = [ 'José', 'Evandro']
@endphp
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'danger')
                @slot('value', '2')
                @slot('title', 'Nota menor que 80')
                @slot('icon', 'far fa-frown')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'success')
                @slot('value', '6')
                @slot('title', 'Nota maior que 80')
                @slot('icon', 'fas fa-graduation-cap')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'info')
                @slot('value', '85.5')
                @slot('title', 'IRA da Matéria')
                @slot('icon', 'fas fa-calculator')
            @endcomponent
        </div>
        <div class="col-md-3 col-sm-12">
            @component('components.smallBox')
                @slot('color', 'warning')
                @slot('value', '80')
                @slot('title', 'Nota mínima para bonificação')
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
                    @for($i = 0 ; $i < 6 ; $i++)
                        <tr>
                            <td>{{ $i +1 }}</td>
                            <td>{{ $canReceived[$i] }}</td>
                            <td>{{ 100 - ($i+1)*3.3  }} </td>
                        </tr>
                    @endfor
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
                    @for($i = 0 ; $i < 2 ; $i++)
                        <tr>
                            <td>{{ $i + 7 }}</td>
                            <td>{{ $canotReceived[$i] }}</td>
                            <td>{{ 85 - ($i+1)*5.4  }} </td>
                        </tr>
                    @endfor
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
