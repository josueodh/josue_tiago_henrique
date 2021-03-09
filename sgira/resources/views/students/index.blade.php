@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Alunos')
        @can('create', App\User::class)
            @slot('create', route('students.create'))
        @endcan
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($students as $student)
                @can('view', $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->registration }}</td>
                        <td class="button-index">
                            @can('update', $student)
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            @endcan
                             <a href="{{ route('students.show', $student->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            @can('delete', $student)
                                <form class="form-delete" action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endcan
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
