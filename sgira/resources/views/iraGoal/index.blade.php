@extends('layouts.master')

@section('content')

    @component('components.index')
    @slot('title','Planejamento de formatura')
    @slot('body')

    <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fas fa-chart-line"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Meta do IRA</span>
            <span class="info-box-number">{{ $iraGoal }}</span>
        </div>      
            <a href="{{ route('iraGoal.edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>                        
     
    </div>
    <!-- /.info-box -->
    @endslot

    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/delete.js') }}"></script>
@endpush
