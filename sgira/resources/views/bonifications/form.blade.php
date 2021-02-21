<div class="row">
    <div class="col-sm-12 form-group">
        <label for="student_id" class="required">Nome do Aluno</label>
        <select name="student_id"  required value="{{ old('student_id',$bonification->student_id ) }}" class="form-control select2 @error('student_id') is-invalid @enderror" id="student_id">
            <option></option>
            @foreach($students as $students)
                <option value="{{ $students->id }}">{{ $students->name }}</option>
            @endforeach
        </select>
        @error('teacher_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 form-group">
        <label for="partner_id" class="required">Parceiro</label>
        <select name="partner_id"  required value="{{ old('partner_id',$bonification->partner_id ) }}" class="form-control select2 @error('partner_id') is-invalid @enderror" id="partner_id">
            <option></option>
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
            @endforeach
        </select>
        @error('subject_id')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-md-6 col-sm-12">
        <label for="year" class="required">Validade</label>
        <input type="date" required class="form-control" name="expirationDate" id="expirationDate" value="{{ old('expirationDate', $bonification->expirationDate) }}" >
        @error('expirationDate')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="description" class="required">Descrição </label>
        <input type="text" required class="form-control" name="description" id="description" value="{{ old('description', $bonification->description) }}">
    </div>
</div>
