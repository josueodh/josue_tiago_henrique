@extends('layouts.master')

@section('content')
    @component('components.index')
        @slot('title','Parceiros')
        @slot('create', route('partners.create'))
        @slot('header')
        <tr>
            <th>ID</th>
            <th></th>
            <th>Ações</th>
        </tr>
        @endslot
        @slot('body')
            @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td></td>
                    <td class="button-index">
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <form class="form-delete" action="{{ route('partners.destroy', $partner->id) }}" method="post">
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
