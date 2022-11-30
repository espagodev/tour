<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
    <strong>Categoria:</strong>
    <div class="form-group">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="categoria_id"><i class="fa fa-list"></i></label>
            </div>
            <select class="custom-select" name="categoria_id" id="categoria_id">
                <option value="">Seleccione</option>
                @foreach($categorias as  $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->cat_nombre}}</option>
                    @endforeach
            </select>
        </div>
    </div>
</div>
