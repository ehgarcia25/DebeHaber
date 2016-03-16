<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Accounts
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $account_code
 * @method static \Illuminate\Database\Query\Builder|\App\Accounts account($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Accounts nombre($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Accounts allCuentas()
 */
	class Accounts {}
}

namespace App{
/**
 * App\Activos_Fijos
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $fixed_asset_group_id
 * @property integer $currency_rate_id
 * @property string $name
 * @property string $details
 * @property integer $quantity
 * @property float $purchase_value
 * @property string $purchase_date
 * @property string $timestamp
 * @property integer $user_id
 * @property string $series
 * @method static \Illuminate\Database\Query\Builder|\App\Activos_Fijos activos()
 */
	class Activos_Fijos {}
}

namespace App{
/**
 * App\Calendario
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $user_id
 * @property string $start
 * @property string $end
 * @property string $allDay
 * @property string $title
 * @property string $url
 */
	class Calendario {}
}

namespace App{
/**
 * App\Ciclos
 *
 * @property integer $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property integer $company_id
 * @method static \Illuminate\Database\Query\Builder|\App\Ciclos anno($fecha)
 * @method static \Illuminate\Database\Query\Builder|\App\Ciclos periodo($id)
 */
	class Ciclos {}
}

namespace App{
/**
 * App\Cobros_Pagos
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property integer $customer_id
 * @property integer $account_id
 * @property integer $currency_rate_id
 * @property float $payment_total
 * @property string $payment_number
 * @property string $series
 * @property string $payment_date
 * @property string $timestamp
 * @property integer $user_id
 */
	class Cobros_Pagos {}
}

namespace App{
/**
 * App\Comercial_invoice_iva
 *
 * @property integer $id
 * @property integer $commercial_invoice_id
 * @property integer $vat_id
 * @property float $value
 * @property string $timestamp
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Comercial_invoice_iva getMontoIva($id)
 */
	class Comercial_invoice_iva {}
}

namespace App{
/**
 * App\Comercial_iva
 *
 * @property integer $id
 * @property integer $commercial_invoice_id
 * @property integer $vat_id
 * @property float $value
 * @property string $timestamp
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Comercial_iva valorIva($valor)
 */
	class Comercial_iva {}
}

namespace App{
/**
 * App\Comercial_return_iva
 *
 * @property integer $id
 * @property integer $commercial_return_id
 * @property integer $vat_id
 * @property float $value
 * @property string $timestamp
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Comercial_return_iva valorIva($valor)
 */
	class Comercial_return_iva {}
}

namespace App{
/**
 * App\Compras
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $costcenter_id
 * @property integer $currency_rate_id
 * @property float $invoice_total
 * @property string $invoice_number
 * @property string $invoice_code
 * @property integer $payment_condition
 * @property string $series
 * @property string $comment
 * @property string $invoice_date
 * @property string $timestamp
 * @property integer $user_id
 * @property boolean $is_accounted_customer
 * @property boolean $is_accounted_supplier
 * @property integer $cuotas
 * @property string $tipo
 * @property string $code_date
 * @property integer $id_relaciones
 * @method static \Illuminate\Database\Query\Builder|\App\Compras compra($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Compras aprobarCompra($id)
 */
	class Compras {}
}

namespace App{
/**
 * App\Compras_Ventas
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $costcenter_id
 * @property integer $currency_rate_id
 * @property float $invoice_total
 * @property string $invoice_number
 * @property string $invoice_code
 * @property integer $payment_condition
 * @property string $series
 * @property string $comment
 * @property string $invoice_date
 * @property string $timestamp
 * @property integer $user_id
 * @property boolean $is_accounted_customer
 * @property boolean $is_accounted_supplier
 * @property integer $cuotas
 * @property string $tipo
 * @property string $code_date
 * @property integer $id_relaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Relaciones[] $relaciones
 * @method static \Illuminate\Database\Query\Builder|\App\Compras_Ventas compra($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Compras_Ventas aprobarCompra($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Compras_Ventas misCompras($cliente)
 * @method static \Illuminate\Database\Query\Builder|\App\Compras_Ventas misVentas($proveedor)
 * @method static \Illuminate\Database\Query\Builder|\App\Compras_Ventas getTimbrado($id_relacion, $fecha)
 */
	class Compras_Ventas {}
}

namespace App{
/**
 * App\CostCenter
 *
 * @property integer $id
 * @property string $name
 * @property integer $company_id
 * @property boolean $is_product
 * @property boolean $is_fixedasset
 * @property boolean $is_expense
 */
	class CostCenter {}
}

namespace App{
/**
 * App\Cuenta
 *
 * @property integer $id
 * @property integer $chart_id
 * @property integer $country_id
 * @property integer $company_id
 * @property integer $vat_id
 * @property integer $fixed_asset_group_id
 * @property integer $account_id
 * @property integer $cost_center_id
 * @property string $code
 * @property string $name
 * @property integer $chart_type
 * @property integer $chart_subtype
 * @property integer $level
 * @property boolean $active
 * @property boolean $is_generic
 * @property boolean $active_pres
 * @property integer $my_company_id
 * @property boolean $charts_generic
 * @method static \Illuminate\Database\Query\Builder|\App\Cuenta cuentasSinPres($chart_id)
 * @method static \Illuminate\Database\Query\Builder|\App\Cuenta nivel1()
 * @method static \Illuminate\Database\Query\Builder|\App\Cuenta nivel2()
 * @method static \Illuminate\Database\Query\Builder|\App\Cuenta nivel3()
 * @method static \Illuminate\Database\Query\Builder|\App\Cuenta padre($padre)
 */
	class Cuenta {}
}

namespace App{
/**
 * App\Diario
 *
 * @property integer $id
 * @property integer $cycle_id
 * @property integer $journal_template_id
 * @property string $trans_comment
 * @property string $trans_date
 * @property string $timestamp
 * @property integer $user_id
 * @property integer $company_id
 */
	class Diario {}
}

namespace App{
/**
 * App\Diario_Detalles
 *
 * @property integer $id
 * @property float $debit
 * @property float $credit
 * @property integer $chart_id
 * @property integer $journal_id
 * @property string $timestamp
 */
	class Diario_Detalles {}
}

namespace App{
/**
 * App\Diario_Template
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property boolean $is_active
 * @property-read \App\Diario_Template_Detalles $details
 */
	class Diario_Template {}
}

namespace App{
/**
 * App\Diario_Template_Detalles
 *
 * @property integer $id
 * @property integer $journal_templates_id
 * @property integer $chart_id
 * @property boolean $is_debit
 * @property float $coefficient
 */
	class Diario_Template_Detalles {}
}

namespace App{
/**
 * App\Divisas
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $country_id
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas moneda($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas monedas()
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas miMoneda($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas divisas()
 */
	class Divisas {}
}

namespace App{
/**
 * App\Divisas_rate
 *
 * @property integer $id
 * @property integer $currency_id
 * @property integer $country_id
 * @property float $buy_rate
 * @property float $sell_rate
 * @property string $trans_date
 * @property string $timestamp
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas_rate taza($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas_rate tazaFecha($fecha)
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas_rate getTaza($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Divisas_rate buscar($name)
 */
	class Divisas_rate {}
}

namespace App{
/**
 * App\Empresa
 *
 * @property integer $id
 * @property integer $app_subscription_id
 * @property integer $country_id
 * @property integer $audit_id
 * @property integer $accounting_id
 * @property string $name
 * @property string $alias
 * @property string $gov_code
 * @property boolean $active
 * @property string $razon_social
 * @property integer $telefono
 * @property string $direccion
 * @property string $email
 * @property string $ruc_representante
 * @property string $name_representante
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa compania($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa comp()
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa otrasCompnias($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa empresas()
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa buscar($name)
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa buscarNew($name)
 * @method static \Illuminate\Database\Query\Builder|\App\Empresa getEmpresaPorCodigo($codigo)
 */
	class Empresa {}
}

namespace App{
/**
 * App\Grupo_Activos_Fijos
 *
 * @property integer $id
 * @property string $name
 * @property float $coefficient
 * @property integer $lifespan
 * @property boolean $is_tangible
 * @property string $timestamp
 * @property integer $user_id
 */
	class Grupo_Activos_Fijos {}
}

namespace App{
/**
 * App\Iva
 *
 * @property integer $id
 * @property string $name
 * @property float $coeficient
 * @property integer $country_id
 * @method static \Illuminate\Database\Query\Builder|\App\Iva iva($id)
 */
	class Iva {}
}

namespace App{
/**
 * App\Notas_Credito_Compras_Ventas
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $currency_rate_id
 * @property float $return_total
 * @property string $return_number
 * @property string $return_code
 * @property string $series
 * @property string $motivo
 * @property string $comment
 * @property string $return_date
 * @property string $timestamp
 * @property string $user_id
 * @property boolean $is_accounted_customer
 * @property boolean $is_accounted_supplier
 * @property integer $cost_center_id
 * @property integer $id_relaciones
 * @property string $code_date
 * @property string $tipo
 * @property string $return_number_factura
 * @method static \Illuminate\Database\Query\Builder|\App\Notas_Credito_Compras_Ventas misCompras($cliente)
 * @method static \Illuminate\Database\Query\Builder|\App\Notas_Credito_Compras_Ventas misVentas($proveedor)
 */
	class Notas_Credito_Compras_Ventas {}
}

namespace App{
/**
 * App\Pais
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 */
	class Pais {}
}

namespace App{
/**
 * App\Presupuesto
 *
 * @property integer $id
 * @property float $value
 * @property integer $cycle_id
 * @property integer $chart_id
 * @method static \Illuminate\Database\Query\Builder|\App\Presupuesto presupuesto($id_cuenta)
 */
	class Presupuesto {}
}

namespace App{
/**
 * App\Rango
 *
 * @property integer $id
 * @property integer $id_company
 * @property integer $id_branch
 * @property integer $id_terminal
 * @property integer $id_user
 * @property integer $star_range
 * @property integer $end_range
 * @property integer $current_range
 * @property string $end_date
 * @property string $timestamp
 * @property integer $code
 * @property string $template
 * @property string $mask
 * @property string $name
 * @property integer $tipo
 * @method static \Illuminate\Database\Query\Builder|\App\Rango rangos($id_sucrusal, $tipo)
 * @method static \Illuminate\Database\Query\Builder|\App\Rango valoractual($id)
 */
	class Rango {}
}

namespace App{
/**
 * App\Relaciones
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $supplier_id
 * @property boolean $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Empresa[] $companias
 * @method static \Illuminate\Database\Query\Builder|\App\Relaciones getRelacion($cliente, $proveedor)
 * @method static \Illuminate\Database\Query\Builder|\App\Relaciones getMisRelaciones($cliente)
 * @method static \Illuminate\Database\Query\Builder|\App\Relaciones existeRelacion($cliente, $proveedor)
 */
	class Relaciones {}
}

namespace App{
/**
 * App\Retencion
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $costcenter_id
 * @property integer $currency_rate_id
 * @property float $witholding_total
 * @property string $witholding_number
 * @property string $witholding_code
 * @property string $series
 * @property string $comment
 * @property string $witholding_date
 * @property string $timestamp
 * @property integer $user_id
 * @property string $witholding_number_bill
 * @property float $iva
 * @property float $valor_sin_iva
 * @property float $retencion
 * @property float $importe
 * @property integer $id_relaciones
 * @property string $tipo
 * @method static \Illuminate\Database\Query\Builder|\App\Retencion misCompras($cliente)
 * @method static \Illuminate\Database\Query\Builder|\App\Retencion misVentas($proveedor)
 */
	class Retencion {}
}

namespace App{
/**
 * App\Role
 *
 * @property integer $id
 * @property string $name
 */
	class Role {}
}

namespace App{
/**
 * App\Sucursal
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $code
 * @method static \Illuminate\Database\Query\Builder|\App\Sucursal sucursales($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Sucursal sucursalCode($id)
 */
	class Sucursal {}
}

namespace App{
/**
 * App\Terminal
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $id_company
 * @property integer $id_user
 * @property string $code
 * @property string $name
 * @property string $timestamp
 * @method static \Illuminate\Database\Query\Builder|\App\Terminal terminal($id_sucrusal)
 * @method static \Illuminate\Database\Query\Builder|\App\Terminal terminalCode($id)
 * @method static \Illuminate\Database\Query\Builder|\App\Terminal terminales($id)
 */
	class Terminal {}
}

namespace App{
/**
 * App\Timbrado
 *
 * @property integer $id
 * @property string $value
 * @property integer $company_id
 * @property string $end_date
 * @method static \Illuminate\Database\Query\Builder|\App\Timbrado getTimbrado($id, $fecha)
 */
	class Timbrado {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $company_id
 * @property string $name
 * @property string $name_full
 * @property string $email
 * @property string $password
 * @property boolean $active
 * @property string $confirm_token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $telephone
 * @property string $direction
 * @property-read \App\Empresa $Empresa
 * @method static \Illuminate\Database\Query\Builder|\App\User company($id_company)
 * @method static \Illuminate\Database\Query\Builder|\App\User name($id)
 * @method static \Illuminate\Database\Query\Builder|\App\User buscar($name)
 */
	class User {}
}

namespace App{
/**
 * App\Ventas
 *
 * @property integer $id
 * @property integer $id_branch
 * @property integer $costcenter_id
 * @property integer $currency_rate_id
 * @property float $invoice_total
 * @property string $invoice_number
 * @property string $invoice_code
 * @property integer $payment_condition
 * @property string $series
 * @property string $comment
 * @property string $invoice_date
 * @property string $timestamp
 * @property integer $user_id
 * @property boolean $is_accounted_customer
 * @property boolean $is_accounted_supplier
 * @property integer $cuotas
 * @property string $tipo
 * @property string $code_date
 * @property integer $id_relaciones
 */
	class Ventas {}
}

