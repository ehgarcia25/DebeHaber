<?php

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

Route::get('/', array('as' => 'dashboard',function () {
    return view('dashboard');
}));

Route::get('profile', array('as' => 'profile',function () {
    return view('admin/profile');
}));

Route::get('page', array('as' => 'page',function () {
    return view('admin/page');
}));

Route::get('activos', array('as' => 'asset_nav',function () {
    return view('transactions/asset_nav');
}));

Route::get('activos_form', array('as' => 'asset_form',function () {
    return view('transactions/asset_form');
}));

Route::get('asset_group_form', array('as' => 'asset_group_form',function () {
    return view('transactions/asset_group_form');
}));

Route::get('ventas', array('as' => 'sales_nav',function () {
    return view('transactions/sales_nav');
}));

Route::get('ventas_form', array('as' => 'sales_form',function () {
    return view('transactions/sales_form');
}));

Route::get('compras', array('as' => 'purchase_nav',function () {
    return view('transactions/purchase_nav');
}));

Route::get('compras_form', array('as' => 'purchase_form',function () {
    return view('transactions/purchase_form');
}));

Route::get('retencion', array('as' => 'witholding_nav',function () {
    return view('transactions/witholding_nav');
}));

Route::get('retencion_form', array('as' => 'witholding_form',function () {
    return view('transactions/witholding_form');
}));

Route::get('credito', array('as' => 'creditnote_nav',function () {
    return view('transactions/creditnote_nav');
}));

Route::get('credito_form', array('as' => 'creditnote_form',function () {
    return view('transactions/creditnote_form');
}));
