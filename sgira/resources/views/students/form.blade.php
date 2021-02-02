<div class="row">
    <div class="form-group col-sm-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', $student->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="email" class="required">E-mail</label>
        <input type="email" class="form-control " required value="{{ old('email', $student->email ) }}" name="email"  id="email">
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="registration" class="required">Matrícula</label>
        <input type="stromg" class="form-control " required value="{{ old('registration', $student->registration ) }}" name="registration"  id="registration">
        @error('registration')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="born_date" class="required">Data de Nascimento</label>
        <input type="date" class="form-control " required value="{{ old('born_date', $student->born_date ) }}" name="born_date"  id="born_date">
        @error('born_date')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <label for="confirm_password" class="required">Senha</label>
        <input type="password" class="form-control " required value="{{ old('confirm_password', $student->confirm_password ) }}" name="confirm_password"  id="confirm_password">
        @error('confirm_password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <label for="password" class="required">Confirme sua senha</label>
        <input type="password" class="form-control " required value="{{ old('password', $student->password ) }}" name="password"  id="password">
        @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <input type="hidden" id="is_admin" name="is_admin" value="0">
</div>
