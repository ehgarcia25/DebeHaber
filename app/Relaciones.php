<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relaciones extends Model
{
    public $timestamps = false;

    protected $table = 'relaciones';

    protected $fillable = ['customer_id','supplier_id', 'active'];


    public function companias()
    {
        return $this->hasMany('App\Empresa');
    }


    public function scopegetRelacion($query,$cliente,$proveedor){
        return $query->where('customer_id',$cliente)->where('supplier_id',$proveedor);
    }
    public function scopegetMisRelaciones($query,$cliente){
        return $query->where('customer_id',$cliente);
    }


    public function scopeExisteRelacion($query,$cliente,$proveedor){

        return $query->where('customer_id',$cliente)->where('supplier_id',$proveedor)
            ->orwhere(function ($query) use ($cliente,$proveedor){
                $query->where('customer_id',$proveedor)->where('supplier_id',$cliente);
            });
    }

}
