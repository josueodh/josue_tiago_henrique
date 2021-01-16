@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Cursos')
        @slot('create', route('courses.create'))
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Duração</th>
            <th></th>
        </tr>
        @endslot
        @slot('body')
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->duration }}</td>
                    <td class="button-index">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form class="form-delete" action="{{ route('courses.destroy', $course->id) }}" method="post">
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
