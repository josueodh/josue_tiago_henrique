@extends('layouts.master')
@section('title', $course->name)
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'info')
            @slot('value', $course->students->count())
            @slot('title', 'Total de Alunos')
            @slot('icon', 'fas fa-user')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'warning')
            @slot('value', 80)
            @slot('title', 'IRA')
            @slot('icon', 'far fa-file')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'secondary')
            @slot('value', 25)
            @slot('title', 'Bonificações')
            @slot('icon', 'fas fa-award')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'success')
            @slot('value', $course->total_graduate)
            @slot('title', 'Alunos Formados')
            @slot('icon', 'fas fa-user-graduate')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'danger')
            @slot('value', $course->total_graduate)
            @slot('title', 'Duração')
            @slot('icon', 'far fa-clock')
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-12">
        @component('components.smallBox')
            @slot('color', 'info')
            @slot('value', $course->subjects->count())
            @slot('title', 'Matérias')
            @slot('icon', 'fas fa-book-open')
        @endcomponent
    </div>
</div>
    @component('components.index')
        @slot('title','Alunos Formados')
        @slot('header')
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td class="button-index">
                        <a href="{{ route('students.dashboard', $student->id) }}" class="btn btn-success"><i class="fas fa-chart-line"></i></a>
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
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
