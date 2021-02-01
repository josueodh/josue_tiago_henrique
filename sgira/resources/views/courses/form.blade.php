<div class="row">
    <div class="form-group col-sm-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$course->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="duration" class="required">Duração</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control @error('duration') is-invalid @enderror" required value="{{ old('duration', $course->duration ) }}" name="duration"  id="duration">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">horas</span>
            </div>
        </div>
        @error('duration')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
