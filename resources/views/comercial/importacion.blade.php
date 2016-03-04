@extends('layouts.master')

@section('title', 'Cobros | DebeHaber')
@section('Title', 'Cobros')
@section('breadcrumbs', Breadcrumbs::render('cobros'))

@section('content')





<form class="form-horizontal">


    <div class="col-md-8">

        <div class='form-group'>
            <label for="despacho" class="col-sm-3 control-label">Nro. Despacho:</label>
            <div class="col-sm-4">
                <input type="text" name="despacho" class="form-control" value="" />

            </div>
        </div>
        <div class='form-group'>
            <label for="condicion" class="col-sm-3 control-label">Condición:</label>
            <div class="col-sm-4">
                <input type="text" name="condicion" class="form-control" value="" />

            </div>
        </div>
        <div class='form-group'>
            <label for="caso" class="col-sm-3 control-label">Caso:</label>
            <div class="col-sm-4">
                <input type="text" name="caso" class="form-control" value="" />

            </div>
        </div>


        <div class='form-group'>
            <label for="fecha" class="col-sm-3 control-label">Fecha:</label>
            <div class="col-sm-4">
                <input type="date" name="fecha" class="date form-control" value="" />

            </div>
        </div>







        <div class="form-group">
            <div class="panel-heading clearfix">

            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Factura</th>
                            <th>Moneda</th>
                            <th>Tipo de Cambio</th>
                             <th></th>
                            <th>Retencion</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"> 


                                <label for="factura" class="col-sm-7 control-label">Valor de la Factura:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="factura" class="form-control" value="" />

                                </div>

                            </th>
                            <td>    <select class="form-control">

                                    <option value="">Dólares</option>
                                    <option value="">Euro</option>
                                    <option value="">Guaranies</option>

                                </select>
                            </td>
                            <td> </td>
                           <td> </td>
                            <td> <input type="checkbox" name="marcado" /> <a href="#">Renta</td>
                            <th><input type="checkbox" name="marcado" /> <a href="#">Renta</th>
                        </tr>
                        <tr>
                            <th scope="row">

                                <label for="flete" class="col-sm-7 control-label">Flete:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="flete" class="form-control" value="" />

                                </div>
                            </th>
                            <td> 
                                <select class="form-control">

                                    <option value="">Dólares</option>
                                    <option value="">Euro</option>
                                    <option value="">Guaranies</option>

                                </select></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th><a href="#"><i class="icon-pencil" /></th>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="seguro" class="col-sm-7 control-label">Seguro:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="seguro" class="form-control" value="" />

                                </div>
                            </th>
                            <td> <select class="form-control">

                                    <option value="">Dólares</option>
                                    <option value="">Euro</option>
                                    <option value="">Guaranies</option>

                                </select></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th><a href="#"><i class="icon-pencil" /></a></th>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="costos" class="col-sm-7 control-label">Otros costos:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="costos" class="form-control" value="" />

                                </div>
                            </th>
                            <td> <select class="form-control">

                                    <option value="">Dólares</option>
                                    <option value="">Euro</option>
                                    <option value="">Guaranies</option>

                                </select></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th><a href="#"><i class="icon-pencil" /></a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-md-4">


        <div class='form-group'>

            <label for="name" class="col-sm-3 control-label">Cliente:</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="" />
                <div class="panel-heading clearfix">

                </div>
                <i class="icon-plus col-md-2"></i><i class="icon-pencil col-md-2" ></i><i class="icon-settings col-md-2" ></i>

            </div>
        </div>




    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="col-sm-8">
                <button class="btn btn-default">Cargar Retención</button>               
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8">                
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </div>


</form>

@endsection