<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retencion extends Model
{
    public $timestamps = false;

    protected $table = 'commercial_witholding';

    protected $fillable = ['customer_id', 'customer_branch_id','supplier_id', 'supplier_branch_id', 'costcenter_id', 'currency_rate_id',
        'witholding_total', 'witholding_number', 'witholding_code', 'witholding_number_bill', 'series'
        ,'witholding_date', 'timestamp','comment','cost_center_id','user_id','tipo','iva','valor_sin_iva'];


    public function scopeMisCompras($query,$cliente){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_witholding.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_witholding.id_relaciones')
            ->join('companies as c',function($join) use ($cliente){
                $join->on('c.id', '=', 'r.supplier_id')
                    ->where('r.customer_id','=',$cliente);
            })
            ->select('commercial_witholding.*', 'name', 'currency_rates.currency_id');
    }

    public function scopeMisVentas($query,$proveedor){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_witholding.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_witholding.id_relaciones')
            ->join('companies as c',function($join) use ($proveedor){
                $join->on('c.id', '=', 'r.customer_id')
                    ->where('r.supplier_id','=',$proveedor);
            })
            ->select('commercial_witholding.*', 'name', 'currency_rates.currency_id');
    }
}
