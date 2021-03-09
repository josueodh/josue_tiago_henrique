@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Matérias')
        @can('create', App\Subject::class)
            @slot('create', route('subjects.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Creditos</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->credits_hours }}</td>
                    <td class="button-index">
                    @can('update', $subject)
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    @endcan
                    <a href="{{ route('subjects.dashboard', $subject->id) }}" class="btn btn-dark"><i class="fas fa-chart-bar"></i></a>
                    <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                    @can('delete', $subject)
                        <form class="form-delete" action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
