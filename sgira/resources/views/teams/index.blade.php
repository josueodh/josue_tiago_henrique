@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title', 'Turmas')
        @slot('create',route('teams.create'))
        @slot('header')
            <th>Nome</th>
            <th></th>
        @endslot
        @slot('body')
           @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>        
                    <td class="options">
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-success">Mostrar</a>
                        <form class="form-delete" action="{{ route('teams.destroy', $team->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"> Deletar</button>
                        </form>
                        
                    </td>        
                </tr>
           @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
