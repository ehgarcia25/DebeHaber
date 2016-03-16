<?php
use JasperPHP\JasperPHP as JasperPHP;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('welcome', array('as' => 'welcome', function () {
    return view('welcome');
}));

Route::get('/', array('as' => 'dashboard', function () {

<<<<<<< HEAD
    if (Auth::check()){
            return view('dashboard');
    }

    else
        return redirect('auth/login');

}));
Route::get('/home', array('as' => 'dashboard', function () {
    if (Auth::check())
        return view('dashboard');
    else
        return redirect('auth/login');
=======
    if (Auth::check())
        return view('dashboard');
    else
        return redirect('auth/login');

>>>>>>> origin/master
}));
Route::get('/home', array('as' => 'dashboard', function () {
    if (Auth::check())
        return view('dashboard');
    else
        return redirect('auth/login');
}));

//
//Route::get('/', array('as' => 'dashboard','uses'=> 'EmpresaController@index'));
//Route::get('/home', array('as' => 'dashboard','uses'=> 'EmpresaController@index'));

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//Route::get('users', array('as' => 'index',function () {
//     return view('users/index');
//}));

Route::get('users', ['as' => 'users', 'uses' => 'UsuarioController@index']);
Route::get('buscar_usuario', ['as' => 'buscar_usuario', 'uses' => 'UsuarioController@buscar']);
Route::get('create', ['as' => 'create', 'uses' => 'UsuarioController@create']);
Route::post('store', ['as' => 'store', 'uses' => 'UsuarioController@store']);

//Route::get('reporting', ['uses' => 'ReportController@index', 'as' => 'Report']);
Route::get('reporting', ['uses' => 'ReportController@post']);

Route::get('informe_libro_diario', ['as'=>'informe_libro_diario','uses' => 'ReportController@libro_diario']);
Route::post('generar_libro_diario', ['uses' => 'ReportController@generar_diario']);





Route::get('list_empresas', ['as' => 'empresas', 'uses' => 'EmpresaController@index']);
Route::get('empresa', ['as' => 'empresa', 'uses' => 'EmpresaController@create']);
Route::post('store_empresa', ['as' => 'store_empresa', 'uses' => 'EmpresaController@store']);

Route::post('select_empresa/{id}', ['as' => 'select_empresa', 'uses' => 'EmpresaController@select_empresa']);

Route::get('seleccionar_empresa/{id}', ['as' => 'seleccionar_empresa', 'uses' => 'EmpresaController@seleccionar']);


<<<<<<< HEAD
//
//Route::get('/', array('as' => 'dashboard','uses'=> 'EmpresaController@index'));
//Route::get('/home', array('as' => 'dashboard','uses'=> 'EmpresaController@index'));

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//Route::get('users', array('as' => 'index',function () {
//     return view('users/index');
//}));

Route::get('users', ['as' => 'users', 'uses' => 'UsuarioController@index']);
Route::get('buscar_usuario', ['as' => 'buscar_usuario', 'uses' => 'UsuarioController@buscar']);
Route::get('create', ['as' => 'create', 'uses' => 'UsuarioController@create']);
Route::post('store', ['as' => 'store', 'uses' => 'UsuarioController@store']);

//Route::get('reporting', ['uses' => 'ReportController@index', 'as' => 'Report']);
Route::get('reporting', ['uses' => 'ReportController@post']);

Route::get('informe_libro_diario', ['as'=>'informe_libro_diario','uses' => 'ReportController@libro_diario']);
Route::post('generar_libro_diario', ['uses' => 'ReportController@generar_diario']);





Route::get('list_empresas', ['as' => 'empresas', 'uses' => 'EmpresaController@index']);
Route::get('empresa', ['as' => 'empresa', 'uses' => 'EmpresaController@create']);
Route::post('store_empresa', ['as' => 'store_empresa', 'uses' => 'EmpresaController@store']);

Route::post('select_empresa/{id}', ['as' => 'select_empresa', 'uses' => 'EmpresaController@select_empresa']);

Route::get('seleccionar_empresa/{id}', ['as' => 'seleccionar_empresa', 'uses' => 'EmpresaController@seleccionar']);


=======
>>>>>>> origin/master

//Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');


Route::get('profile', array('as' => 'profile', function () {
    return view('admin/profile');
}));

Route::get('calendario', array('as' => 'calendario', function () {
    return view('admin/calendario');
}));

Route::get('calendario_pruebas', array('as' => 'calendario_pruebas', function () {
    return view('admin/calendario_pruebas');
}));

Route::get('calendario_prueba', ['as' => 'calendario_prueba', 'uses' => 'CalendarioController@index']);
Route::get('calendario_prueba/{id}', ['as' => 'calendario_prueba', 'uses' => 'CalendarioController@index']);
Route::get('add_evento', ['as' => 'add_evento', 'uses' => 'CalendarioController@store']);
Route::get('update_evento', ['as' => 'update_evento', 'uses' => 'CalendarioController@update']);
Route::get('delete_evento/{id}', ['as' => 'delete_evento', 'uses' => 'CalendarioController@destroy']);

Route::get('timezone', array('as' => 'timezone', function () {
    return json_encode(DateTimeZone::listIdentifiers());
}));

//Route::get('activos', array('as' => 'asset_nav',function () {
//    return view('transactions/asset_nav');
//}));

Route::get('list_terminal', ['as' => 'list_terminal', 'uses' => 'TerminalController@index']);
Route::get('terminal_form', ['as' => 'terminal_form', 'uses' => 'TerminalController@create']);
Route::get('edit_terminal_form/{id}', ['as' => 'edit_terminal_form', 'uses' => 'TerminalController@edit']);
Route::post('save_terminal', ['as' => 'save_terminal', 'uses' => 'TerminalController@store']);
Route::put('update_terminal/{id}', ['as' => 'update_terminal', 'uses' => 'TerminalController@update']);
Route::get('delete_terminal/{id}', ['as' => 'delete_terminal', 'uses' => 'TerminalController@destroy']);

Route::get('activos', ['as' => 'asset_nav', 'uses' => 'ActivosController@index']);
Route::get('activos_form', ['as' => 'asset_form', 'uses' => 'ActivosController@create_activos']);
Route::put('update_activo/{id}', ['as' => 'update_activo', 'uses' => 'ActivosController@updateActivo']);
Route::get('edit_activo/{id}', ['as' => 'edit_activo', 'uses' => 'ActivosController@editActivo']);
Route::put('update_grupo_activo/{id}', ['as' => 'update_grupo_activo', 'uses' => 'ActivosController@updateGrupoActivo']);
<<<<<<< HEAD
Route::get('edit_grupo_activo/{id}', ['as' => 'edit_grupo_activo', 'uses' => 'ActivosController@editGrupoActivo']);
=======
Route::get('edit_grupo_activo/{id}', ['as' => 'edit_grupo_activo', 'uses' => 'ActivosController@editGrupoActivos']);
>>>>>>> origin/master
Route::post('save_activos_form', ['as' => 'save_activos_form', 'uses' => 'ActivosController@store_activos']);
Route::get('asset_group_form', ['as' => 'asset_group_form', 'uses' => 'ActivosController@create_grupo_activos']);
Route::post('save_asset_group_form', ['as' => 'save_asset_group_form', 'uses' => 'ActivosController@store_grupo_activos']);
Route::get('delete_activo/{id}', ['as' => 'delete_activo', 'uses' => 'ActivosController@destroy']);
Route::get('delete_grupo_activo/{id}', ['as' => 'delete_grupo_activo', 'uses' => 'ActivosController@destroy']);

//
//Route::get('activos_form', array('as' => 'asset_form',function () {
//    return view('transactions/asset_form');
//}));
//
//Route::get('asset_group_form', array('as' => 'asset_group_form',function () {
//    return view('transactions/asset_group_form');
//}));

//Route::get('ventas', array('as' => 'sales_nav',function () {
//    return view('transactions/sales_nav');
//}));

Route::get('ventas', ['as' => 'sales_nav', 'uses' => 'VentasController@index']);

Route::get('ventas_form', ['as' => 'sales_form', 'uses' => 'VentasController@create']);


Route::post('save_ventas', ['as' => 'save_ventas', 'uses' => 'VentasController@RealizarVenta']);

Route::get('edit_venta/{id}', ['as' => 'edit_venta', 'uses' => 'VentasController@edit']);

Route::get('delete_venta/{id}', ['as' => 'delete_venta', 'uses' => 'VentasController@delete']);

Route::post('update_venta', ['as' => 'update_venta', 'uses' => 'VentasController@RealizarVentaUpdate']);

/*Route::get('compras', array('as' => 'purchase_nav',function () {
    return view('transactions/purchase_nav');
}));*/

Route::get('compras', ['as' => 'purchase_nav', 'uses' => 'ComprasController@index']);

Route::get('compras_form', ['as' => 'purchase_form', 'uses' => 'ComprasController@create']);
<<<<<<< HEAD

Route::post('save_compras', ['as' => 'save_compras', 'uses' => 'ComprasController@RealizarCompra']);

=======

Route::post('save_compras', ['as' => 'save_compras', 'uses' => 'ComprasController@RealizarCompra']);

>>>>>>> origin/master
Route::get('edit_compra/{id}', ['as' => 'edit_compra', 'uses' => 'ComprasController@edit']);

Route::get('delete_compras/{id}', ['as' => 'edit_compra', 'uses' => 'ComprasController@delete']);

Route::post('update_compra', ['as' => 'update_compra', 'uses' => 'ComprasController@RealizarCompraUpdate']);


Route::get('retencion', array('as' => 'witholding_nav', function () {
    return view('transactions/witholding_nav');
}));

Route::get('retencion_form', array('as' => 'witholding_form', function () {
    return view('transactions/witholding_form');
}));

Route::get('retencion', ['as' => 'witholding_nav', 'uses' => 'RetencionController@index']);

Route::get('retencion_form', ['as' => 'witholding_form', 'uses' => 'RetencionController@create']);

Route::post('save_retencion', ['as' => 'save_retencion', 'uses' => 'RetencionController@store']);

Route::get('edit_retencion/{id}', ['as' => 'edit_witholding_form', 'uses' => 'RetencionController@edit']);

Route::get('delete_retencion/{id}', ['as' => 'delete_retencion', 'uses' => 'RetencionController@destroy']);

Route::put('update_retencion/{id}', ['as' => 'update_retencion', 'uses' => 'RetencionController@update']);




Route::get('credito', ['as' => 'creditnote_nav', 'uses' => 'Notas_creditoController@index']);

Route::get('creditnote_form_compras', ['as' => 'creditnote_form', 'uses' => 'Notas_creditoController@createCompras']);

Route::post('save_credito_compras', ['as' => 'save_credito_compras', 'uses' => 'Notas_creditoController@RealizarNotaCreditoCompra']);

Route::get('creditnote_form_ventas', ['as' => 'creditnote_form', 'uses' => 'Notas_creditoController@createVentas']);

<<<<<<< HEAD
Route::post('save_credito_ventas', ['as' => 'save_credito_ventas', 'uses' => 'Notas_creditoController@RealizarNotaCreditoVenta']);
=======
Route::post('save_credito_ventas', ['as' => 'save_credito_compras', 'uses' => 'Notas_creditoController@RealizarNotaCreditoVenta']);
>>>>>>> origin/master

Route::get('edit_credit/{id}', ['as' => 'edit_credit', 'uses' => 'Notas_creditoController@edit']);

Route::get('delete_credit/{id}', ['as' => 'delete_credit', 'uses' => 'Notas_creditoController@destroy']);

<<<<<<< HEAD
Route::post('update_credit_ventas', ['as' => 'update_credit', 'uses' => 'Notas_creditoController@RealizarNotaCreditoUpdateVenta']);
Route::post('update_credit_compras', ['as' => 'update_credit', 'uses' => 'Notas_creditoController@RealizarNotaCreditoUpdateCompra']);
=======
Route::post('update_credit', ['as' => 'update_credit', 'uses' => 'Notas_creditoController@RealizarNotaCreditoUpdate']);

>>>>>>> origin/master
//Route::get('plan_cuenta', array('as' => 'plancuenta',function () {
//    return view('contabilidad/plan_cuenta');
//}));


Route::get('plan_cuenta', ['as' => 'plancuenta', 'uses' => 'CuentaController@index']);

Route::post('save_plan_cuenta', ['as' => 'save_plancuenta', 'uses' => 'CuentaController@store']);

Route::post('edit_cuenta', ['as' => 'edit_cuenta', 'uses' => 'CuentaController@edit']);
<<<<<<< HEAD
Route::put('update_plan_cuenta/{id}', ['as' => 'update_plan_cuenta', 'uses' => 'CuentaController@update']);
=======
Route::post('update_plan_cuenta', ['as' => 'update_plan_cuenta', 'uses' => 'CuentaController@update']);
>>>>>>> origin/master
Route::post('delete_cuenta', ['as' => 'delete_cuenta', 'uses' => 'CuentaController@destroy']);

//Route::get('cobros', array('as' => 'cobros',function () {
//    return view('comercial/cobros');
//}));


Route::get('cobros', ['as' => 'cobros', 'uses' => 'CobrosController@index']);

Route::get('form_cobros', ['as' => 'form_cobros', 'uses' => 'CobrosController@create']);

Route::post('save_cobros', ['as' => 'save_cobros', 'uses' => 'CobrosController@store']);
Route::post('crear_cobro', ['as' => 'crear_pago', 'uses' => 'CobrosController@store_cobro']);

Route::get('edit_cobros/{id}', ['as' => 'edit_cobros', 'uses' => 'CobrosController@edit']);

Route::get('delete_cobros/{id}', ['as' => 'delete_cobros', 'uses' => 'CobrosController@delete']);

Route::post('update_cobros', ['as' => 'update_cobros', 'uses' => 'CobrosController@update']);

Route::post('buscar_account', ['as' => 'buscar_account', 'uses' => 'CobrosController@buscar_account']);

Route::post('buscar_cliente', ['as' => 'buscar_cliente', 'uses' => 'CobrosController@buscar_cliente']);


Route::get('pagos', ['as' => 'pagos', 'uses' => 'PagosController@index']);
<<<<<<< HEAD

Route::get('form_pagos', ['as' => 'form_pagos', 'uses' => 'PagosController@create']);

Route::post('save_pagos', ['as' => 'save_pagos', 'uses' => 'PagosController@store']);

Route::post('crear_pago', ['as' => 'crear_pago', 'uses' => 'PagosController@store_pago']);

Route::get('edit_pagos/{id}', ['as' => 'edit_pagos', 'uses' => 'PagosController@edit']);

=======

Route::get('form_pagos', ['as' => 'form_pagos', 'uses' => 'PagosController@create']);

Route::post('save_pagos', ['as' => 'save_pagos', 'uses' => 'PagosController@store']);

Route::post('crear_pago', ['as' => 'crear_pago', 'uses' => 'PagosController@store_pago']);

Route::get('edit_pagos/{id}', ['as' => 'edit_pagos', 'uses' => 'PagosController@edit']);

>>>>>>> origin/master
Route::get('delete_pagos/{id}', ['as' => 'delete_pagos', 'uses' => 'PagosController@delete']);

Route::post('update_pagos', ['as' => 'update_pagos', 'uses' => 'PagosController@update']);

Route::post('buscar_account_pagos', ['as' => 'buscar_account', 'uses' => 'PagosController@buscar_account']);

Route::post('buscar_probeedor', ['as' => 'buscar_cliente', 'uses' => 'PagosController@buscar_cliente']);


Route::get('list_asiento', ['as' => 'list_asiento', 'uses' => 'DiarioController@index']);
Route::get('libro_diario', ['as' => 'libro_diario', 'uses' => 'DiarioController@create']);
Route::post('save_diario', ['as' => 'save_diario', 'uses' => 'DiarioController@store']);

Route::post('save_plantilla', ['as' => 'save_plantilla', 'uses' => 'DiarioController@store_plantilla']);

Route::post('show_result', ['as' => 'show_result', 'uses' => 'DiarioController@show']);

Route::post('activar_cuenta', ['as' => 'activar_cuenta', 'uses' => 'DiarioController@activar']);

//Route::post('form_auxiliar',['as' => 'form_auxiliar', 'uses' => 'DiarioController@show']);

//Route::put('form_auxiliar', array('as' => 'form_auxiliar',function () {
//    return view('informes/form_auxiliar');
//}));

Route::get('importaciones', array('as' => 'importaciones', function () {
    return view('comercial/importacion');
}));

Route::get('divisas', ['as' => 'divisas', 'uses' => 'DivisasController@index']);
Route::get('divisasform', ['as' => 'divisasform', 'uses' => 'DivisasController@create']);
Route::get('divisasrateform', ['as' => 'divisasrateform', 'uses' => 'DivisasController@create_rate']);
Route::get('edit_divisa/{id}', ['as' => 'edit_divisa', 'uses' => 'DivisasController@edit']);
Route::get('edit_divisa_rate/{id}', ['as' => 'edit_divisa_rate', 'uses' => 'DivisasController@editRate']);

Route::get('delete_divisa/{id}', ['as' => 'delete_divisa', 'uses' => 'DivisasController@destroy']);

Route::post('update_divisa', ['as' => 'update_divisa', 'uses' => 'DivisasController@update']);
Route::post('update_divisa_rate', ['as' => 'update_divisa_rate', 'uses' => 'DivisasController@updateRate']);

Route::post('save_divisa', ['as' => 'save_divisa', 'uses' => 'DivisasController@store']);
Route::post('save_divisa_rate', ['as' => 'save_divisa_rate', 'uses' => 'DivisasController@store_rate']);

Route::get('get_taza_cambio/{id}', ['as' => 'get_taza_cambio', 'uses' => 'DivisasController@getTazas']);

Route::get('buscar_taza_fecha/{fecha}', ['as' => 'buscar_taza_fecha', 'uses' => 'DivisasController@busqueda_fecha']);

Route::get('ciclos', ['as' => 'ciclos', 'uses' => 'CiclosController@index']);

Route::get('form_ciclos', ['as' => 'form_ciclos', 'uses' => 'CiclosController@create']);

Route::get('hacer_copy_ciclos/{id}', ['as' => 'hacer_copy_ciclos', 'uses' => 'CiclosController@copy_ciclo']);
Route::post('save_ciclos', ['as' => 'save_ciclos', 'uses' => 'CiclosController@store']);


Route::get('edit_ciclos/{id}', ['as' => 'edit_ciclos', 'uses' => 'CiclosController@edit']);

Route::post('get_presupuesto', ['as' => 'get_presupuesto', 'uses' => 'CiclosController@show']);

Route::post('annadir_presupuesto', ['as' => 'annadir_presupuesto', 'uses' => 'CiclosController@presupuesto']);

Route::get('delete_ciclos/{id}', ['as' => 'delete_ciclos', 'uses' => 'CiclosController@delete']);

Route::post('update_ciclos', ['as' => 'update_ciclos', 'uses' => 'CiclosController@update']);


Route::get('presupuesto', ['as' => 'presupuesto', 'uses' => 'PresupuestoController@index']);
Route::post('save_presupuesto', ['as' => 'save_presupuesto', 'uses' => 'PresupuestoController@store']);


//Route::post('save_ventas', ['as' => 'save_ventas', 'uses' => 'VentasController@store']);

Route::get('empresas', function () {

    return \App\Empresa::paginate(100)->items();
});


Route::get('edit_empresa/{id}', ['as' => 'edit_empresa', 'uses' => 'EmpresaController@edit']);
Route::get('delete_empresa/{id}', ['as' => 'edit_empresa', 'uses' => 'EmpresaController@destroy']);

Route::get('update_empresa/{id}', ['as' => 'update_empresa', 'uses' => 'EmpresaController@update']);

Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UsuarioController@edit']);
//Route::get('update/{id}', ['as' => 'update', 'uses' => 'UsuarioController@update']);
Route::put('update/{id}', ['as' => 'update', 'uses' => 'UsuarioController@update']);
Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'UsuarioController@destroy']);
Route::get('show/{id}', ['as' => 'show', 'uses' => 'UsuarioController@show']);


Route::post('users/updateprofile', 'UsuarioController@updateProfile');

//Route::get('usuario/index', ['as' => 'usuario.index', 'uses' => 'UsuarioController@index']);


//Route::get('create', ['as' => 'usuario.create', 'uses' => 'UsuarioController@create']);

//Route::get('usuario', 'UsuarioController@index');
//Route::get('/usuario/create', function (){
//    return view('usuario/create');
//});

//Route::get('show/{id}', 'UsuarioController@show');

//Route::get('show/{id}', ['as' => 'usuario.show', 'uses' => 'UsuarioController@show']);
//Route::get('usuario/{id}', function (){
//    return view('usuario/show');
//});

//Route::get('edit/{id}', 'UsuarioController@edit');
//Route::get('edit/{id}', ['as' => 'usuario.edit', 'uses' => 'UsuarioController@edit']);
//Route::get('show/{id}', function (){
//    return view('usuario/show');
//});

//Route::delete('/{usuario}', ['as' => 'usuario.destroy', 'uses' => 'UsuarioController@destroy']);

//Route::resource('usuario', 'UsuarioController');
//Route::resource('usuario', 'UsuarioController');


Route::get('buscar_taza_cambio/{id}', 'DivisasController@seleccionar_taza');
Route::get('taza_cambio_fecha/{fecha}', 'DivisasController@taza_fecha');

Route::get('list_centro_costo', ['as' => 'list_centro_costo', 'uses' => 'CentroCostoController@index']);
Route::get('centro_costo_form', ['as' => 'centro_costo_form', 'uses' => 'CentroCostoController@create']);
Route::get('edit_costo_form/{id}', ['as' => 'edit_costo_form', 'uses' => 'CentroCostoController@edit']);
Route::post('save_centro_costo', ['as' => 'save_centro_costo', 'uses' => 'CentroCostoController@store']);
Route::put('update_centro_costo/{id}', ['as' => 'update_centro_costo', 'uses' => 'CentroCostoController@update']);

Route::get('list_rango', ['as' => 'list_rango', 'uses' => 'RangoController@index']);
Route::get('rango_form', ['as' => 'rango_form', 'uses' => 'RangoController@create']);
Route::get('edit_rango_form/{id}', ['as' => 'edit_rango_form', 'uses' => 'RangoController@edit']);
Route::post('save_rango', ['as' => 'save_rango', 'uses' => 'RangoController@store']);
Route::put('update_rango/{id}', ['as' => 'update_rango', 'uses' => 'RangoController@update']);
<<<<<<< HEAD
Route::get('delete_rango/{id}', ['as' => 'delete_rango', 'uses' => 'RangoController@destroy']);
=======
>>>>>>> origin/master

Route::get('list_accounts', ['as' => 'list_accounts', 'uses' => 'AccountsController@index']);
Route::get('account_form', ['as' => 'account_form', 'uses' => 'AccountsController@create']);
Route::get('edit_account_form/{id}', ['as' => 'edit_account_form', 'uses' => 'AccountsController@edit']);
Route::post('save_account', ['as' => 'save_account', 'uses' => 'AccountsController@store']);
Route::put('update_account/{id}', ['as' => 'update_account', 'uses' => 'AccountsController@update']);

Route::get('list_sucursal', ['as' => 'list_sucursal', 'uses' => 'SucursalController@index']);
Route::get('sucursal_form', ['as' => 'sucursal_form', 'uses' => 'SucursalController@create']);
Route::get('edit_sucursal_form/{id}', ['as' => 'edit_sucursal_form', 'uses' => 'SucursalController@edit']);
Route::post('save_sucursal', ['as' => 'save_sucursal', 'uses' => 'SucursalController@store']);
Route::put('update_sucursal/{id}', ['as' => 'update_sucursal', 'uses' => 'SucursalController@update']);
Route::get('delete_sucursal/{id}', ['as' => 'delete_sucursal', 'uses' => 'SucursalController@destroy']);

Route::get('list_terminal', ['as' => 'list_terminal', 'uses' => 'TerminalController@index']);
Route::get('terminal_form', ['as' => 'terminal_form', 'uses' => 'TerminalController@create']);
Route::get('edit_terminal_form/{id}', ['as' => 'edit_terminal_form', 'uses' => 'TerminalController@edit']);
Route::post('save_terminal', ['as' => 'save_terminal', 'uses' => 'TerminalController@store']);
Route::put('update_terminal/{id}', ['as' => 'update_terminal', 'uses' => 'TerminalController@update']);
Route::get('delete_terminal/{id}', ['as' => 'delete_terminal', 'uses' => 'TerminalController@destroy']);

Route::get('list_iva', ['as' => 'list_iva', 'uses' => 'IvaController@index']);
Route::get('iva_form', ['as' => 'iva_form', 'uses' => 'IvaController@create']);
Route::get('edit_iva_form/{id}', ['as' => 'edit_iva_form', 'uses' => 'IvaController@edit']);
Route::post('save_iva', ['as' => 'save_iva', 'uses' => 'IvaController@store']);
Route::put('update_iva/{id}', ['as' => 'update_iva', 'uses' => 'IvaController@update']);
Route::get('delete_iva/{id}', ['as' => 'delete_iva', 'uses' => 'IvaController@destroy']);


Route::post('save_timbrado', ['as' => 'save_timbrado', 'uses' => 'TimbradoController@store']);

Route::get('cargar_timbrado/{id}/{fecha}', function ($id, $fecha) {
    $company = \App\Empresa::where('gov_code',$id)->get();
    $timbrado = \App\Timbrado::getTimbrado($company[0]->id,$fecha)->lists('value','id');
    //dd($timbrado);
    $decodificar = json_decode($timbrado);
    if ($decodificar != []) {
       return response()->json($timbrado);
   }
    return null;
});

Route::get('cargar_terminal/{id_sucursal}', function ($id_sucursal) {
$terminal= \App\Terminal::terminal($id_sucursal);
    $decodificar = json_decode($terminal);
    if($decodificar!=[]){
       return response()->json($terminal);
    }
return null;
});

Route::get('cargar_rangos/{id_sucursal}/{tipo}', function ($id_sucursal,$tipo) {
    $rango= \App\Rango::rangos($id_sucursal,$tipo)->lists('name','id');
    $decodificar = json_decode($rango);
    if($decodificar!=[]){
        return response()->json($rango);
    }
    return null;
});

Route::get('cargar_valor_actual/{id_rango}', 'RangoController@Cargar_Factura');


Route::get('proveedores/{frase}',function ($frase) {

     $prov= \App\Empresa::buscar($frase)->get();

    echo $prov;
});

Route::get('obtener_timbrado/{codigo}/{fecha}',function ($codigo,$fecha) {

    $proveedor= \App\Empresa::getEmpresa_por_codigo($codigo)->get();

    if(json_decode($proveedor)!=[]){

        $relacion= \App\Relaciones::getRelacion(Session::get('id_empresa'),$proveedor[0]->id)->get();
        if(json_decode($relacion)!=[]){
            $timbrados= \App\Compras_Ventas::getTimbrado($relacion[0]->id,$fecha)->get();
            if(json_decode($timbrados)!=[]){
                echo $timbrados;
            }
        }
    }
});



<<<<<<< HEAD
Route::get('cargar_fecha_vencimiento/{codigo}',function ($codigo) {

    $fecha= \App\Compras_Ventas::get_fecha_vencimiento($codigo)->get();

    return response()->json(['fecha_vencimiento'=>date("m/d/Y", strtotime($fecha[0]->code_date))]);


});

Route::get('cargar_arbol', 'CuentaController@cargar_arbol');
Route::get('padre_cuenta/{id}', 'CuentaController@padre_cuenta');
Route::get('leer_cuenta/{id}', 'CuentaController@leer_cuenta');

Route::get('crear_session_sucursal/{id}', function($id){
    $sucursal=\App\Sucursal::find($id);
    \Session::put('id_sucursal',$sucursal->id);
    \Session::put('codigo_sucursal',$sucursal->code);
});

=======
>>>>>>> origin/master

Route::get('cargar_campos/{codigo}/{tipo_retencion}', ['as' => 'cargar_campos', 'uses' => 'RetencionController@cargar_campos']);
Route::get('cargar_montos/{factura}', ['as' => 'cargar_montos', 'uses' => 'RetencionController@cargar_montos']);

Route::get('hechouka_compras', ['as' => 'hechouka_compras', 'uses' => 'HechoukaComprasController@hechouka_Compra']);
Route::get('hechouka_ventas', ['as' => 'hechouka_ventas', 'uses' => 'HechoukaVentasController@hechouka_Venta']);