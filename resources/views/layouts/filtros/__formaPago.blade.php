<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
    <strong>Forma de Pago:</strong>
    <div class="form-group">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="forma_pago_id"><i class="fa fa-list"></i></label>
            </div>
            <select class="custom-select" name="forma_pago_id" id="forma_pago_id">
                <option value="">Seleccione</option>
                @foreach ($opcionesPagos as $opcionPago)
                    <option value="{{ $opcionPago->id }}">{{ $opcionPago->fop_nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
