

        <form class="form-horizontal" method="post" action="update_plan_cuenta" >

            {!! csrf_field() !!}

            <input type="hidden" name="micompania" value="{{App\Empresa::Comp(Auth::user()->company_id)[0]->id}}">
            <input type="hidden" name="micuenta" value="{{$micuenta->id}}">
            <div class="form-group">
                <label for="padre" class="col-sm-3 control-label">Cuenta Padre</label>
                <div class="col-sm-7">
                    <select class="form-control" id="activos" name="padre">

                        <option class="col" value="{{$micuenta->chart_id}}">
                            @if($mipadre!=null)
                            {{$mipadre->name}}
                            @endif
                        </option>

                        @foreach($cuentas as $item)
                            <option class="{{$item->code}}" value="{{$item->id}}">{{$item->name}}</option>

                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Nombre Cuenta</label>
                <div class="col-sm-7">
                    <input type="text" name="name" class="form-control"
                           value="{{$micuenta->name}}" required>
                    <div class="text-danger">{{$errors->first('name')}}</div>
                </div>

            </div>

            <div class="form-group">
                <label for="codigo" class="col-sm-3 control-label" id="valor_cuenta">Código</label>
                <div class="col-sm-7">
                    <input type="hidden" name="codigo1" class="form-control" value="" id="valor_cuenta1" >
                    <input type="number" name="codigo" class="form-control"  value="{{$micuenta->code}}" required>
                    <div class="text-danger">{{$errors->first('codigo')}}</div>
                </div>

            </div>

            <div class="form-group">
                <label for="tipo" class="col-sm-3 control-label">Tipo</label>
                <div class="col-sm-7">
                    <select class=" select form-control" name="tipo" id="tipo" required>
                        <option value="{{$micuenta->chart_type}}">
                            @if($micuenta->chart_type==1)
                                Activo
                             @elseif($micuenta->chart_type==2)
                                Pasivo
                            @elseif($micuenta->chart_type==3)
                                Patrimonio
                            @elseif($micuenta->chart_type==4)
                                Ingreso
                            @elseif($micuenta->chart_type==5)
                                Gasto
                            @endif

                        </option>
                        <option value="activo">Activo</option>
                        <option value="pasivo">Pasivo</option>
                        <option value="patrimonio">Patrimonio</option>
                        <option value="ingreso">Ingreso</option>
                        <option value="gasto">Gasto</option>
                    </select>

                </div>
            </div>

            <div class="form-group">

                <label for="detalles" class="col-sm-7 control-label">Contabilidad Automática</label>
                <div class="col-sm-3">
                    <input type="checkbox" name="detalles" class="form-control" id="check" value="1"
                           onchange="javascript:showContent()">
                </div>


            </div>

            <div id="contenedor">
                <div id="activo" style="display: none;">

                    <div class="form-group">

                        <label for="cuentas_cobrar" class="col-sm-4 control-label">Cuentas por Cobrar</label>
                        <div class="col-sm-3">
                            <input type="radio" name="activos" id="activo1" class=" radio-inline form-control"
                                   value="cuentas_cobrar">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div1">
                            <select class=" select form-control" name="select_cuentas_cobrar">
                                @foreach($companies as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">

                        <label for="inventario" class="col-sm-4 control-label">Inventario</label>
                        <div class="col-sm-3">
                            <input type="radio" name="activos" id="activo2" class="radio-inline form-control"
                                   value="inventario">
                        </div>
                        <div class="col-sm-5" style="display: none;" id="div2">
                            <select class=" select form-control" name="select_inventario">
                                @foreach($centro_costo as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">

                        <label for="activo_fijo" class="col-sm-4 control-label">Activo Fijo</label>
                        <div class="col-sm-3">
                            <input type="radio" name="activos" id="activo3" class="radio-inline form-control"
                                   value="activo_fijo">
                        </div>
                        <div class="col-sm-5" style="display: none;" id="div3">
                            <select class=" select form-control" name="select_activo_fijo">
                                @foreach($grupo_activos as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div id="pasivo" style="display: none;">

                    <div class="form-group">

                        <label for="cuentas_pagar" class="col-sm-4 control-label">Cuentas por Pagar</label>
                        <div class="col-sm-3">
                            <input type="radio" name="pasivos" class=" radio-inline form-control"
                                   value="cuentas_pagar">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div4">
                            <select class=" select form-control" name="select_cuentas_pagar">
                                @foreach($companies as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">

                        <label for="iva" class="col-sm-4 control-label">IVA</label>
                        <div class="col-sm-3">
                            <input type="radio" name="pasivos" class="radio-inline form-control" value="iva">
                        </div>
                        <div class="col-sm-5" style="display: none;" id="div5">
                            <select class=" select form-control" name="select_iva">
                                @foreach($iva as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <!--                <div class="form-group">

                                         <label for="activo_fijo" class="col-sm-4 control-label">Activo Fijo</label>
                                        <div class="col-sm-3">
                                            <input type="radio" name="activos" class="radio-inline form-control" >
                                        </div>

                                    </div>-->
                </div>

                <div id="patrimonio" style="display: none;">


                </div>

                <div id="ingreso" style="display: none;">

                    <div class="form-group">

                        <label for="ingresos" class="col-sm-4 control-label">Ingresos</label>
                        <div class="col-sm-3">
                            <input type="radio" name="ingresos" class=" radio-inline form-control"
                                   value="ingresos">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div6">
                            <select class=" select form-control" name="select_ingresos">
                                <option value="">...</option>
                            </select>

                        </div>
                    </div>

                </div>

                <div id="gasto" style="display: none;">

                    <div class="form-group">

                        <label for="rr_hh" class="col-sm-4 control-label">Recursos Humanos</label>
                        <div class="col-sm-3">
                            <input type="radio" name="gastos" class=" radio-inline form-control" value="rr_hh">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div7">
                            <select class=" select form-control" name="select_rr_hh">
                                <option value="">...</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">

                        <label for="admin" class="col-sm-4 control-label">Administración</label>
                        <div class="col-sm-3">
                            <input type="radio" name="gastos" class=" radio-inline form-control" value="admin">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div8">
                            <select class=" select form-control" name="select_admin">
                                @foreach($centro_costo as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">

                        <label for="depreciacion" class="col-sm-4 control-label">Depreciación</label>
                        <div class="col-sm-3">
                            <input type="radio" name="gastos" class=" radio-inline form-control"
                                   value="depreciacion">

                        </div>
                        <div class="col-sm-5" style="display: none;" id="div9">
                            <select class=" select form-control" name="select_depreciacion">
                                <option value="">...</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="update_cuenta">Actualizar</button>
            </div>
        </form>

        <script src="{{url()}}/auxiliar/js/plan_cuentas.js"></script>