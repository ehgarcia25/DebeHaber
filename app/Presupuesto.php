<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
         public $timestamps = false;
    
     protected $table = 'budgets';
    
    protected $fillable = ['value','char_id', 'cycle_id'];// //


    public function scopePresupuesto($query,$id_cuenta)
    {
        return $query->where('chart_id',$id_cuenta)->get();
    }
}
