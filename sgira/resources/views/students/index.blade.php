@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Alunos')
        @slot('create', route('students.create'))
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>IRA</th>
            <th></th>
        </tr>
        @endslot
        @slot('body')
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->registration }}</td>
                    <td>{{ $student->ira }}</td>
                    <td class="button-index">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('students.destroy', $student->id) }}" method="post">
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
