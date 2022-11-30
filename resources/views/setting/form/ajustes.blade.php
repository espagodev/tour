<div class="row">
    <div class="col-sm-12">
        <form class="row g-3 needs-validation" action="{{ route('empresa.updateAjustes',$empresa->id) }}" method="post" id="add_sell_form" novalidate="">
            @csrf 
            {{ method_field('PUT') }}
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="time_zone_id">Zona Horaria</label>
                            <select class="form-control  single-select" name="time_zone_id" id="time_zone_id"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($zonasHoraria as $zonaHoraria)
                                    <option value="{{ $zonaHoraria->id }}" @if($zonaHoraria->id == old('time_zone_id', $empresa->time_zone_id)) selected @endif>{{ $zonaHoraria->tiz_timezone }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="divisa_id">Moneda</label>
                            <select class="form-control  single-select" name="divisa_id" id="divisa_id"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($divisas as $divisa)
                                    <option value="{{ $divisa->id }}" @if($divisa->id == old('divisa_id', $empresa->divisa_id)) selected @endif>{{ $divisa->div_pais }} ({{ $divisa->div_moneda }} - {{ $divisa->div_codigo }})</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="aje_simbolo_moneda">Ubicación Simbolo de
                                Moneda</label>
                            <select class="form-control " name="aje_simbolo_moneda" id="aje_simbolo_moneda"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($ubicacionSiombolos as $key => $ubicacionSiombolo)
                                    <option value="{{ $key }}" @if($key == old('aje_simbolo_moneda', $empresa->aje_simbolo_moneda)) selected @endif>{{ $ubicacionSiombolo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="date_format_id">Formato Fecha</label>
                            <select class="form-control  single-select" name="date_format_id" id="date_format_id"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($formatoFechas as $formatoFecha)
                                    <option value="{{ $formatoFecha->id }}" @if($formatoFecha->id == old('date_format_id', $empresa->date_format_id)) selected @endif>{{ $formatoFecha->daf_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="time_format_id">Formato Hora</label>
                            <select class="form-control  single-select" name="time_format_id" id="time_format_id"
                                required>
                                <option value="">Seleccione</option>
                                @foreach ($formatoHoras as $formatoHora)
                                    <option value="{{ $formatoHora->id }}" @if($formatoHora->id == old('time_format_id', $empresa->time_format_id)) selected @endif>{{ $formatoHora->tif_nombre }}</option>
                                @endforeach
                            </select>
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
