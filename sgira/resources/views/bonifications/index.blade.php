@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Bonificações')
        @slot('create', route('bonifications.create'))
        @slot('header')
        <tr>
            <th>Id do Aluno</th>
            <th>Descrição</th>
            <th>Validade</th>
            <th>Parceiro</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($bonifications as $bonification)
                <tr>
                    <td>{{ $bonification->student_id }}</td>
                    <td>{{ $bonification->description }}</td>
                    <td>{{ $bonification->expirationDate }}</td>
                    <td>{{ $bonification->partner_id}}</td>
                    <td class="button-index">
                        <a href="{{ route('bonifications.edit', $bonification->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('bonifications.show', $bonification->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <form class="form-delete" action="{{ route('bonifications.destroy', $bonification->id) }}" method="post">
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
