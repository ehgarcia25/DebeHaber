<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activos_Fijos extends Model
{
             public $timestamps = false;
    
     protected $table = 'fixed_assets';
    
    protected $fillable = ['company_id', 'fixed_asset_group_id', 'currency_rate_id', 'name', 'details', 
        'quantity', 'purchase_value', 'purchase_date', 'timestamp', 'user_id','series'];
    
    

    public function scopeActivos($query){
        return $query->join('fixed_asset_groups','fixed_asset_groups.id','=','fixed_assets.fixed_asset_group_id')
            ->select('fixed_assets.*','fixed_asset_groups.name as nombre_grupo','fixed_asset_groups.id as id_grupo')->get();
    }
}
