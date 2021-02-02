<div class="row">
    <div class="form-group col-sm-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$teacher->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="siape" class="required">E-mail</label>
        <input type="email" class="form-control " required value="{{ old('siape', $teacher->email ) }}" name="email"  id="email">
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-12 form-group">
        <label for="siape" class="required">SIAPE</label>
        <input type="number" class="form-control " required value="{{ old('siape', $teacher->siape ) }}" name="siape"  id="siape">
        @error('siape')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <label for="confirm_password" class="required">Senha</label>
        <input type="password" class="form-control " required name="confirm_password"  id="confirm_password">
        @error('confirm_password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-md-6 col-sm-12 form-group">
        <label for="password" class="required">Confirme sua senha</label>
        <input type="password" class="form-control " required  name="password"  id="password">
        @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <input type="hidden" id="is_admin" name="is_admin" value="1">
</div>
