@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Turmas')
        @can('create', App\Team::class)
            @slot('create', route('teams.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Matéria</th>
            <th>Professor</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->subject->name }}</td>
                    <td>{{ $team->teacher->name }}</td>
                    <td class="button-index">
                        @can('grade', $team)
                        <a href="{{ route('grades.index', $team->id) }}" class="btn btn-dark"><i class="fas fa-tasks"></i></a>
                        @endcan
                        @can('ranking', $team)
                        <a href="{{ route('teams.ranking', $team->id) }}" class="btn btn-default"><i class="fas fa-medal"></i></a>
                        @endcan
                        @can('update' , $team)
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can('view', $team)
                            <a href="{{ route('teams.show', $team->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        @endcan
                        @if(Auth::user()->is_admin == 2)
                            @if($team->status == 0)
                                <form class="form-close" action="{{ route('teams.export',$team->id)}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-dark"><i class="fas fa-file-csv"></i></button>
                                </form>
                            @endif
                        @endif
                        @if(Auth::user()->is_admin == 2)
                            @if($team->status == 1)
                                <form class="form-close" action="{{ route('teams.close',$team->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-dark"><i class="fas fa-door-closed"></i></button>
                                </form>
                            @endif
                        @endif
                        @can('delete', $team)
                        <form class="form-delete" action="{{ route('teams.destroy', $team->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endcan
                        @if(Auth::user()->is_admin == 0)
                            <a href="{{ route('teams.enroll', $team->id) }}" class="btn btn-success"><i class="fas fa-file-signature"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
    <script>


    </script>
@endpush
