<?php

// Home
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs -> push('Inicio', route('dashboard'));
});

Breadcrumbs::register('informe_libro_diario', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Informe Libro Diario', route('informe_libro_diario'));
});

Breadcrumbs::register('calendario', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Calendario', route('calendario'));
});

// Home > About
Breadcrumbs::register('list_centro_costo', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Cento Costo', route('list_centro_costo'));
});
Breadcrumbs::register('centro_costo_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_centro_costo');
    $breadcrumbs -> push('Registro', route('centro_costo_form'));
});

Breadcrumbs::register('edit_costo_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_centro_costo');
    $breadcrumbs -> push('Actualizar', route('edit_costo_form'));
});

Breadcrumbs::register('list_rango', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Rango', route('list_rango'));
});

Breadcrumbs::register('rango_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_rango');
    $breadcrumbs -> push('Registro', route('rango_form'));
});

Breadcrumbs::register('edit_rango_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_rango');
    $breadcrumbs -> push('Actualizar', route('edit_rango_form'));
});


Breadcrumbs::register('list_accounts', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Cuentas', route('list_accounts'));
});

Breadcrumbs::register('account_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_accounts');
    $breadcrumbs -> push('Registro', route('account_form'));
});

Breadcrumbs::register('edit_account_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_accounts');
    $breadcrumbs -> push('Actualizar', route('edit_account_form'));
});

Breadcrumbs::register('list_sucursal', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Sucursales', route('list_sucursal'));
});

Breadcrumbs::register('sucursal_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_sucursal');
    $breadcrumbs -> push('Registro', route('sucursal_form'));
});

Breadcrumbs::register('edit_sucursal_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_sucursal');
    $breadcrumbs -> push('Actualizar', route('edit_sucursal_form'));
});

Breadcrumbs::register('list_terminal', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Terminales', route('list_terminal'));
});

Breadcrumbs::register('terminal_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_terminal');
    $breadcrumbs -> push('Registro', route('terminal_form'));
});

Breadcrumbs::register('edit_terminal_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_terminal');
    $breadcrumbs -> push('Actualizar', route('edit_terminal_form'));
});

Breadcrumbs::register('list_iva', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Iva', route('list_iva'));
});

Breadcrumbs::register('iva_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_iva');
    $breadcrumbs -> push('Registro', route('iva_form'));
});

Breadcrumbs::register('edit_iva_form', function($breadcrumbs)
{
    $breadcrumbs->parent('list_iva');
    $breadcrumbs -> push('Actualizar', route('edit_iva_form'));
});

// Home > About
Breadcrumbs::register('sales_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Ventas', route('sales_nav'));
});

Breadcrumbs::register('form_ciclos', function($breadcrumbs)
{
    $breadcrumbs->parent('ciclos');
    $breadcrumbs -> push('Registro', route('form_ciclos'));
});

Breadcrumbs::register('ciclos', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Ciclos', route('ciclos'));
});

Breadcrumbs::register('list_asiento', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Asientos', route('list_asiento'));
});

Breadcrumbs::register('libro_diario', function($breadcrumbs)
{
    $breadcrumbs->parent('list_asiento');
    $breadcrumbs -> push('Diario', route('libro_diario'));
});

Breadcrumbs::register('presupuesto', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Presupuesto', route('presupuesto'));
});

Breadcrumbs::register('divisas', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Divisas', route('divisas'));
});

Breadcrumbs::register('save_divisa', function($breadcrumbs)
{
    $breadcrumbs->parent('divisas');
    $breadcrumbs -> push('Registro', route('save_divisa'));
});

Breadcrumbs::register('save_divisa_rate', function($breadcrumbs)
{
    $breadcrumbs->parent('divisas');
    $breadcrumbs -> push('Registro', route('save_divisa_rate'));
});
// Home > Blog
Breadcrumbs::register('sales_form', function($breadcrumbs)
{
    $breadcrumbs->parent('sales_nav');
    $breadcrumbs -> push('Registro', route('sales_form'));
});

Breadcrumbs::register('update_venta', function($breadcrumbs)
{
    $breadcrumbs->parent('sales_nav');
    $breadcrumbs -> push('Actualizar', route('update_venta'));
});
// Home > About
Breadcrumbs::register('purchase_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Compras', route('purchase_nav'));
});

// Home > Blog
Breadcrumbs::register('purchase_form', function($breadcrumbs)
{
    $breadcrumbs->parent('purchase_nav');
    $breadcrumbs -> push('Registro', route('purchase_form'));
});

Breadcrumbs::register('update_compra', function($breadcrumbs)
{
    $breadcrumbs->parent('purchase_nav');
    $breadcrumbs -> push('Actualizar', route('update_compra'));
});

Breadcrumbs::register('asset_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Activos Fijos', route('asset_nav'));
});

Breadcrumbs::register('asset_form', function($breadcrumbs)
{
    $breadcrumbs->parent('asset_nav');
    $breadcrumbs -> push('Registro de Activos', route('asset_form'));
});

Breadcrumbs::register('asset_group_form', function($breadcrumbs)
{
    $breadcrumbs->parent('asset_nav');
    $breadcrumbs -> push('Registro de Grupos', route('asset_group_form'));
});

Breadcrumbs::register('witholding_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Retenciones', route('witholding_nav'));
});

Breadcrumbs::register('witholding_form', function($breadcrumbs)
{
    $breadcrumbs->parent('witholding_nav');
    $breadcrumbs -> push('Registro', route('witholding_form'));
});

Breadcrumbs::register('edit_witholding_form', function($breadcrumbs)
{
    $breadcrumbs->parent('witholding_nav');
    $breadcrumbs -> push('Actualizar', route('edit_witholding_form'));
});

Breadcrumbs::register('creditnote_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Notas de Crédito', route('creditnote_nav'));
});

Breadcrumbs::register('creditnote_form', function($breadcrumbs)
{
    $breadcrumbs->parent('creditnote_nav');
    $breadcrumbs -> push('Registro', route('creditnote_form'));
});

Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Usuarios', route('users'));
});

Breadcrumbs::register('create', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs -> push('Usuario', route('create'));
});

Breadcrumbs::register('edit', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs -> push('Usuario', route('edit'));
});

Breadcrumbs::register('plancuenta', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Plan de Cuenta', route('plancuenta'));
});

Breadcrumbs::register('cobros', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Cobros', route('cobros'));
});

Breadcrumbs::register('update_cobros', function($breadcrumbs)
{
    $breadcrumbs->parent('cobros');
    $breadcrumbs -> push('Actualizar', route('update_cobros'));
});

Breadcrumbs::register('form_cobros', function($breadcrumbs)
{
    $breadcrumbs->parent('cobros');
    $breadcrumbs -> push('Registro', route('form_cobros'));
});

Breadcrumbs::register('pagos', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Pagos', route('pagos'));
});


Breadcrumbs::register('update_pagos', function($breadcrumbs)
{
    $breadcrumbs->parent('pagos');
    $breadcrumbs -> push('Actualizar', route('update_pagos'));
});

Breadcrumbs::register('form_pagos', function($breadcrumbs)
{
    $breadcrumbs->parent('pagos');
    $breadcrumbs -> push('Registro', route('form_pagos'));
});

Breadcrumbs::register('empresas', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Empresas', route('empresas'));
});

Breadcrumbs::register('empresa', function($breadcrumbs)
{
    $breadcrumbs->parent('empresas');
    $breadcrumbs -> push('Empresa', route('empresa'));
});

Breadcrumbs::register('edit_empresa', function($breadcrumbs)
{
    $breadcrumbs->parent('empresas');
    $breadcrumbs -> push('Empresa', route('edit_empresa'));
});

// // Home > Blog > [Category]
// Breadcrumbs::register('purchase_nav', function($breadcrumbs, $category)
// {
//     $breadcrumbs->parent('dashboard');
//     $breadcrumbs->push($category->title, route('category', $category->id));
// });
//
// // Home > Blog > [Category] > [Page]
// Breadcrumbs::register('purchase_form', function($breadcrumbs, $page)
// {
//     $breadcrumbs->parent('category', $page->category);
//     $breadcrumbs->push($page->title, route('page', $page->id));
// });
