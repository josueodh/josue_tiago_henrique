@extends('layouts.master')

@section('title', 'Enviar email')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{ route('teachers.emailPost') }}" method="post" id="send-email">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input class="form-control" name="assunto" required value="" id="assunto">
                    </div>
                    <div class="form-group">
                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">

                        </textarea>
                    </div>
                    <input type="hidden" id="teacher_id" name="teacher_id" value="{{ $teacher->id }}">
                </form>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <div class="float-right">
                        <button type="submit" form="send-email" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
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
