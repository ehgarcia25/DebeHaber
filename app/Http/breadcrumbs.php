<?php

// Home
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs -> push('Inicio', route('dashboard'));
});

// Home > About
Breadcrumbs::register('sales_nav', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs -> push('Ventas', route('sales_nav'));
});

// Home > Blog
Breadcrumbs::register('sales_form', function($breadcrumbs)
{
    $breadcrumbs->parent('sales_nav');
    $breadcrumbs -> push('Registro', route('sales_form'));
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
    $breadcrumbs -> push('Retención de IVA', route('witholding_nav'));
});

Breadcrumbs::register('witholding_form', function($breadcrumbs)
{
    $breadcrumbs->parent('witholding_nav');
    $breadcrumbs -> push('Registro', route('witholding_form'));
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
