<div class="row">
    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" required autofocus class="form-control" name="name" id="name" value="{{ old('name', $partner->name) }}">
    </div>
    <div class="form-group col-12">
        <label for="img_1" class="required">Imagem do Parceiro</label>
        <div class="mb-2">
            <input type="file" name="imglink" id="imglink" accept="image/*" lang="pt-br" value="{{ old('imglink', $partner->imglink) }}">
        </div>
    </div>
</div>