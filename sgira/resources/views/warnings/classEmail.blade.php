@extends('layouts.master')

@section('title', 'Comunicado')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="to">Turma</label>
                    <input class="form-control" name="to" required autofocus value="{{ old('to') }}" id="to">
                </div>
                <div class="form-group">
                    <label for="subject">Assuno</label>
                    <input class="form-control" name="subject" required value="{{ old('subject') }}" id="subject">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                        {{ old('message')}}
                    </textarea>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('textarea').summernote({
            tabsize: 2,
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol','dl', 'paragraph']],
                ['view', ['fullscreen']]
            ]
        });
    });
</script>
@endpush
