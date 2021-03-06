<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public $timestamps = false;

    protected $table = 'branches';

    protected $fillable = ['company_id','name', 'code'];


    public function scopeSucursales($query,$id)
    {
        return $query->where('company_id',$id)->get();
    }

    public function scopeSucursalCode($query,$id)
    {
        return $query->where('id',$id);
    }

<<<<<<< HEAD
    public function scopeall_sucursales($query){
        $result=$query->where('company_id',\Session::get('id_empresa'))->lists('code','id');
        $result->prepend('', '');
        return $result;
    }
=======
>>>>>>> origin/master

}
