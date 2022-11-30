<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="w-10">Cant</th>
                        <th class="w-30">SubCategoria</th>
                        <th class="w-30">Descripcion</th>
                        <th class="w-20">Valor</th>
                        {{-- <th class="w-20">IVA</th> --}}
                        <th class="w-10"><button id="add_concepto_row" type="button"
                                class="btn  btn-xs"><i data-feather="plus-square"></i></th>
                    </tr>
                </thead>
                <tbody class="list" id="conceptos" >
                    <tr id="concepto_row_template" class="d-none">
                        <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                id="con_cantidad" type="number" value="1" required=""></td>
                        <td><select class="form-select form-select-sm " name="sub_categoria_id[]"
                                id="sub_categoria_id" required="">
                                <option selected="" disabled="" value="">Seleccionar
                                </option>
                                @foreach ($subCategorias as $subCategoria)
                                    <option value="{{ $subCategoria->id }}">
                                        {{ $subCategoria->subc_nombre }}</option>
                                @endforeach
                            </select></td>
                        <td><input class="form-control form-control-sm" name="con_descripcion[]"
                                id="con_descripcion" required="" type="text"></td>
                        <td> <input class="form-control form-control-sm input_number"
                                name="con_monto[]" id="con_monto" type="text" value="{{ !empty($factura->con_monto) ?  $factura->con_monto : '0'  }}">
                        </td>
                        {{-- <td><select class="form-select form-select-sm" name="impuesto_id[]"
                                id="impuesto_id">
                                <option selected="" disabled="" value="">Seleccionar
                                </option>
                                @foreach ($impuestos as $impuesto)
                                    <option value="{{ $impuesto->id }}">
                                        {{ $impuesto->imp_nombre }}%</option>
                                @endforeach
                            </select>
                        </td> --}}
                        <td>
                            <a onclick="removeConceptRow(this)">
                                <i data-feather="trash-2"></i>
                            </a>
                        </td>
                    </tr>
                        @foreach($conceptos as $concepto)
                        <tr>
                            <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                    id="con_cantidad" type="number" value="{{ $concepto->con_cantidad }}" required=""></td>
                            <td><select class="form-select form-select-sm " name="sub_categoria_id_con[]"
                                    id="sub_categoria_id_con" required="">
                                    <option selected="" disabled="" value="">Seleccionar
                                    </option>
                                    @foreach ($subCategorias as $subCategoria)
                                        <option value="{{ $subCategoria->id }}" @if($subCategoria->id == old('sub_categoria_id_con', $concepto->sub_categoria_id_con)) selected @endif> {{ $subCategoria->subc_nombre }}</option>
                                    @endforeach
                                </select></td>
                            <td><input class="form-control form-control-sm" name="con_descripcion[]"
                                    id="con_descripcion" required="" type="text" value="{{ $concepto->con_descripcion }}" ></td>
                            <td> <input class="form-control form-control-sm input_number"
                                    name="con_monto[]" id="con_monto" type="text" value="  {{ !empty($concepto->con_monto) ?  $concepto->con_monto : '0'}}">
                            </td>
                            {{-- <td><select class="form-select form-select-sm" name="impuesto_id[]"
                                    id="impuesto_id">
                                    <option selected="" disabled="" value="">Seleccionar
                                    </option>
                                    @foreach ($impuestos as $impuesto)
                                        <option value="{{ $impuesto->id }}" @if($impuesto->id == old('impuesto_id', $concepto->impuesto_id)) selected @endif>
                                            {{ $impuesto->imp_nombre }}%</option>
                                    @endforeach
                                </select>
                            </td> --}}
                            <td>
                                <a onclick="removeConceptRow(this)">
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