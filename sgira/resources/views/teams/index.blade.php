@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Turmas')
        @slot('create', route('teams.create'))
        @slot('header')
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name}}</td>
                    <td class="button-index">
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <form class="form-delete" action="{{ route('teams.destroy', $team->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
