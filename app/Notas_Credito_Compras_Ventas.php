<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas_Credito_Compras_Ventas extends Model
{
    
     public $timestamps = false;
    
     protected $table = 'commercial_returns';
    
    protected $fillable = ['customer_id', 'customer_branch_id','supplier_id', 'supplier_branch_id', 'costcenter_id', 'currency_rate_id', 
        'return_total', 'return_number', 'return_code', 'motivo', 'series'
        ,'return_date', 'timestamp','tipo','is_accounted_customer','is_accounted_supplier','cost_center_id'];
//


    public function scopeMisCompras($query,$cliente){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_returns.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_returns.id_relaciones')
            ->join('companies as c',function($join) use ($cliente){
                $join->on('c.id', '=', 'r.supplier_id')
                    ->where('r.customer_id','=',$cliente);
            })
            ->select('commercial_returns.*', 'name', 'currency_rates.currency_id');
    }

    public function scopeMisVentas($query,$proveedor){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_returns.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_returns.id_relaciones')
            ->join('companies as c',function($join) use ($proveedor){
                $join->on('c.id', '=', 'r.customer_id')
                    ->where('r.supplier_id','=',$proveedor);
            })
            ->select('commercial_returns.*', 'name', 'currency_rates.currency_id');
    }
}
