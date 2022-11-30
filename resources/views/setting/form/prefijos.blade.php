<div class="row">
    <div class="col-sm-12">
        <form class="row g-3 needs-validation" action="{{ route('ajustesDocumento.update',$prefijo->id) }}" method="post" id="add_sell_form" novalidate="">
            @csrf 
            {{ method_field('PUT') }}

            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_inicial">Iniciar desde:</label>
                            <input class="form-control form-control-sm" id="ajd_inicial" name="ajd_inicial" value="{{ old('ajd_inicial', !empty($prefijo->ajd_inicial) ?  $prefijo->ajd_inicial : '') }}"
                                type="number" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_incremento">Incremento:</label>
                            <input class="form-control form-control-sm" id="ajd_incremento" name="ajd_incremento"
                                value="{{ old('ajd_incremento', !empty($prefijo->ajd_incremento) ?  $prefijo->ajd_incremento : '') }}" type="number" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_digitos">Numero de Dígitos:</label>
                            <select class="form-control " name="ajd_digitos" id="ajd_digitos" required>
                                @foreach ($digitos as $key => $digito)
                                    <option value="{{ $key }}" @if($key == old('ajd_digitos', $prefijo->ajd_digitos)) selected @endif>{{ $digito }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_nota">Nota Credito:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_nota"
                                name="ajd_prefijo_nota" value="{{ old('ajd_prefijo_nota', !empty($prefijo->ajd_prefijo_nota) ?  $prefijo->ajd_prefijo_nota : '') }}" type="text" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_recibo">Recibo de Caja:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_recibo"
                                name="ajd_prefijo_recibo" value="{{ old('ajd_prefijo_recibo', !empty($prefijo->ajd_prefijo_recibo) ?  $prefijo->ajd_prefijo_recibo : '') }}" type="text" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_factura">Factura:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_factura"
                                name="ajd_prefijo_factura" value="{{ old('ajd_prefijo_factura', !empty($prefijo->ajd_prefijo_factura) ?  $prefijo->ajd_prefijo_factura : '') }}" type="text" required>

                        </div>
                       
                       
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_gastos">Gastos:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_gastos"
                                name="ajd_prefijo_gastos" value="{{ old('ajd_prefijo_gastos', !empty($prefijo->ajd_prefijo_gastos) ?  $prefijo->ajd_prefijo_gastos : '') }}" type="text" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_abono_cliente">Abono Cliente:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_abono_cliente"
                                name="ajd_prefijo_abono_cliente" value="{{ old('ajd_prefijo_abono_cliente', !empty($prefijo->ajd_prefijo_abono_cliente) ?  $prefijo->ajd_prefijo_abono_cliente : '') }}" type="text" required>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ajd_prefijo_abono_mayorista">Abono Mayorista:</label>
                            <input class="form-control form-control-sm" id="ajd_prefijo_abono_mayorista"
                                name="ajd_prefijo_abono_mayorista" value="{{ old('ajd_prefijo_abono_mayorista', !empty($prefijo->ajd_prefijo_abono_mayorista) ?  $prefijo->ajd_prefijo_abono_mayorista : '') }}" type="text" required>
                        </div>
                        
                    </div>
                </div>
                <div class="row g-3 col-md-3">
                    <button class="btn btn-secondary" type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
