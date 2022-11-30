<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
    <strong>Mayorista:</strong>
    <div class="form-group">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="mayorista_id"><i class="fa fa-th-list"></i></label>
            </div>
            <select class="custom-select" name="mayorista_id" id="mayorista_id">
                <option value="">Seleccione</option>
                @foreach($mayoristas as  $mayorista)
                        <option value="{{ $mayorista->id }}"  >{{ $mayorista->may_nombre}}</option>
                    @endforeach
            </select>
        </div>
    </div>
</div>
