<div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-xs">
                                    <thead>
                                        <tr>
                                            <th class="w-30">Localizador</th>
                                            <th class="w-30">Pasajero</th>
                                            <th class="w-20">Fecha Ida</th>
                                            <th class="w-20">Fecha Regreso</th>
                                            <th class="w-20">SubCategoria</th>
                                            <th class="w-10"><button id="add_pasajero_row" type="button"
                                                    class="btn  btn-xs"><i data-feather="plus-square"></i></button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="pasajeros">

                                        <tr id="pasajero_row_template" class="d-none">
                                            <td>
                                                <input name="pas_localizador[]" type="text" id="pas_localizador"
                                                    class="form-control form-control-sm " value="" required>
                                            </td>
                                            <td class="select-container">
                                                <select name="agenda_id[]"
                                                    class="form-control form-select-sm priceListener select-with-footer"
                                                    required>
                                                    <option disabled selected>Seleccione un Pasajero</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input name="pas_fecha_salidad[]" type="text" id="pas_fecha_salidad"
                                                    class="form-control form-control-sm datepicker-here"
                                                    data-language="es" data-date-format="dd/mm/yyyy" value=""
                                                    required>
                                            </td>
                                            <td>
                                                <input name="pas_fecha_regreso[]" type="text" id="pas_fecha_regreso"
                                                    class="form-control form-control-sm datepicker-here"
                                                    data-language="es" data-date-format="dd/mm/yyyy" value=""
                                                    required>
                                            </td>
                                            <td><select class="form-select form-control-sm form-select-sm "
                                                    name="sub_categoria_id_pas[]" id="sub_categoria_id_pas"
                                                    required="">
                                                    <option selected="" disabled="" value="">Seleccionar
                                                    </option>
                                                    @foreach ($subCategorias as $subCategoria)
                                                        <option value="{{ $subCategoria->id }}">
                                                            {{ $subCategoria->subc_nombre }}</option>
                                                    @endforeach
                                                </select></td>
                                            <td>
                                                <a onclick="removeRow(this)">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                            @foreach ($pasajeros as $pasajero)
                                                <tr>
                                                    <td>
                                                        <input name="pas_localizador[]" type="text"
                                                            id="pas_localizador" class="form-control form-control-sm "
                                                            value="{{ $pasajero->pas_localizador }}" required>
                                                    </td>
                                                    <td class="select-container">
                                                        <select name="agenda_id[]"
                                                            class="form-control form-select-sm priceListener select-with-footer"
                                                            required>
                                                            <option value="{{ $pasajero->agenda_id }}" selected="">
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input name="pas_fecha_salidad[]" type="text"
                                                            id="pas_fecha_salidad"
                                                            class="form-control form-control-sm datepicker-here"
                                                            data-language="es" data-date-format="dd/mm/yyyy"
                                                            value="{{ $pasajero->pas_fecha_salidad }}" required>
                                                    </td>
                                                    <td>
                                                        <input name="pas_fecha_regreso[]" type="text"
                                                            id="pas_fecha_regreso"
                                                            class="form-control form-control-sm datepicker-here"
                                                            data-language="es" data-date-format="dd/mm/yyyy"
                                                            value="{{ $pasajero->pas_fecha_regreso }}" required>
                                                    </td>
                                                    <td><select class="form-select form-control-sm form-select-sm "
                                                            name="sub_categoria_id_pas[]" id="sub_categoria_id_pas"
                                                            required="">
                                                            <option selected="" disabled="" value="">
                                                                Seleccionar
                                                            </option>
                                                            @foreach ($subCategorias as $subCategoria)
                                                                <option value="{{ $subCategoria->id }}"
                                                                    @if ($subCategoria->id == old('sub_categoria_id_pas', $pasajero->sub_categoria_id_pas)) selected @endif>
                                                                    {{ $subCategoria->subc_nombre }}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td>
                                                        <a onclick="removeRow(this)">
                                                            <i data-feather="trash-2"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>