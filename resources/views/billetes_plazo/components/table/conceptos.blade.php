<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-xs">
                <thead>
                    <tr>
                        <th >Cant</th> 
                        <th >SubCategoria</th>
                        <th >Descripcion</th>
                        <th >Valor</th>
                        <th >Descuento</th>
                        <th >Fee</th>
                        <th ><button id="add_concepto_row" type="button"
                                class="btn  btn-xs"><i data-feather="plus-square"></i></th>
                    </tr>
                </thead>
                <tbody class="list" id="conceptos" >
                    <tr id="concepto_row_template" class="d-none">
                        <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                id="con_cantidad" type="text" value="{{ !empty($factura->con_cantidad) ?  $factura->con_cantidad : '0'  }}" required=""></td>
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
                        <td> <input class="form-control form-control-sm input_number"
                            name="con_descuento[]" id="con_descuento" type="text" value="{{ !empty($factura->con_descuento) ?  $factura->con_descuento : '0'  }}">
                        </td>
                        <td> <input class="form-control form-control-sm input_number"
                            name="con_fee[]" id="con_fee" type="text" value="{{ !empty($factura->con_fee) ?  $factura->con_fee : '0'  }}">
                        </td>
                        
                        <td>
                            <a onclick="removeConceptRow(this)">
                                <i data-feather="trash-2"></i>
                            </a>
                        </td>
                    </tr>
                        @foreach($conceptos as $concepto)
   
                        <tr>
                            <td><input class="form-control form-control-sm input_number" name="con_cantidad[]"
                                    id="con_cantidad" type="text" value="{{ !empty($concepto->con_cantidad) ?  $concepto->con_cantidad : '0'  }}" required=""></td>
                            <td><select class="form-select form-select-sm " name="sub_categoria_id_con[]"
                                    id="sub_categoria_id_con" required="">
                                    <option selected="" disabled="" value="">Seleccionar
                                    </option>
                                    @foreach ($subCategorias as $subCategoria)
                                        <option value="{{ $subCategoria->id }}" @if($subCategoria->id == old('sub_categoria_id', $concepto->sub_categoria_id)) selected @endif> {{ $subCategoria->subc_nombre }}</option>
                                    @endforeach
                                </select></td>
                            <td><input class="form-control form-control-sm" name="con_descripcion[]"
                                    id="con_descripcion" required="" type="text" value="{{ $concepto->con_descripcion }}" ></td>
                            <td> <input class="form-control form-control-sm input_number"
                                    name="con_monto[]" id="con_monto" type="text" value="  {{ !empty($concepto->con_monto) ?  $concepto->con_monto : '0'}}">
                            </td>
                            <td> <input class="form-control form-control-sm input_number"
                                name="con_descuento[]" id="con_descuento" type="text" value="{{ !empty($concepto->con_descuento) ?  $concepto->con_descuento : '0'  }}">
                            </td>
                            <td> <input class="form-control form-control-sm input_number"
                                name="con_fee[]" id="con_fee" type="text" value="{{ !empty($concepto->con_fee) ?  $concepto->con_fee : '0'  }}">
                            </td>

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