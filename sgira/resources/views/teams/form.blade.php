<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome</label>
        <input type="text" autofocus required class="form-control" name="name" id="name" value="{{ old('name', $team->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="student_id" class="required">Alunos</label>
        <select name="student_id[]" class="form-control select2 @error('student_id') is-invalid @enderror multiple" id="student_id" multiple="multiple" required value="{{ json_encode(old('student_id',$team->students->pluck('id'))) }}">
            @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
        @error('student_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="teacher_id" class="required">Professor</label>
        <select name="teacher_id"  required value="{{ old('teacher_id',$team->teacher_id ) }}" class="form-control select2 @error('teacher_id') is-invalid @enderror" id="teacher_id">
            <option></option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        @error('teacher_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="subject_id" class="required">Matéria</label>
        <select name="subject_id"  required value="{{ old('subject_id',$team->subject_id ) }}" class="form-control select2 @error('subject_id') is-invalid @enderror" id="subject_id">
            <option></option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        @error('subject_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="year" class="required">Ano </label>
        <input type="number" min="2020" required class="form-control" name="year" id="year" value="{{ old('year', $team->year) }}" >
        @error('year')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="semester" class="required">Semestre </label>
        <select name="semester" class="form-control select2" id="semester"  required>
            <option value="1">Primeiro</option>
            <option value="2">Segundo</option>
        </select>
        @error('semester')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="status" class="required">Status </label>
        <select name="status" class="form-control select2" id="status"  required>
            <option value="0">Inativo</option>
            <option value="1">Ativo</option>
        </select>
        @error('status')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    </div>
        <div class="col-sm-12 col-md-6 form-group">
        <label for="credits" class="required">Créditos</label>
        <select name="credits"  required value="{{old('credits',$subject->credits ) }}" class="form-control select2 @error('credits') is-invalid @enderror multiple" id="credits">
            <option></option>
            <option>4</option>
            <option>2</option>
        </select>
        @error('credits')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="bonus" class="required">Deseja bonificar?</label>
        <select name="bonus" required  value="{{ json_encode(old('bonus',$team->bonus)) }}" onchange="hide(this)" class="form-control select2 @error('bonus') is-invalid @enderror " id="bonus">
                <option value="1">Sim</option>
                <option value="0">Não</option>
        </select>
        @error('bonus')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="value" class="required" id="valuetext">Valor da Bonificação</label>
        <div class="input-group mb-3">
            <input type="number"  class="form-control  @error('value') is-invalid @enderror"  value="{{ old('value', $team->value ) }}" name="value"  id="value">
        </div>
        @error('value')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="rule" class="required" id="ruletext">Regra da Bonificação</label>
        <div class="input-group mb-3">
            <input type="number"  class="form-control  @error('rule') is-invalid @enderror"  value="{{ old('rule', $team->rule ) }}" name="rule"  id="rule">
        </div>
        @error('rule')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="partner_id" id="partnertext" class="required">Parceiros</label>
        <span id="partner">
            <select name="partner_id" class="form-control select2 @error('partner_id') is-invalid @enderror " id="partner_id"  value="{{ json_encode(old('partner_id',$team->partner_id)) }}">
                @foreach ($partners as $partner)
                    <option hidden value="{{ $partner->id }}">{{ $partner->name }}</option>
                @endforeach
            </select>
        </span>
        @error('partner_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>

@push('scripts')
<script>
    function hide(event){
        if(event.value == 0)
        {
            $("#rule").hide();
            $("#value").hide();
            $("#valuetext").hide();
            $("#ruletext").hide();
            $("#partner").hide();
            $("#partnertext").hide();

        }
        if(event.value == 1)
        {
            $("#rule").show();
            $("#value").show();
            $("#valuetext").show();
            $("#ruletext").show();
            $("#partner").show();
            $("#partnertext").show();

        }
    }
    </script>
@endpush

