<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    public $timestamps = false;

    protected $table = 'rango';

    protected $fillable = ['id_company','id_branch', 'id_terminal','id_user','star_range','end_range','current_range'
        ,'end_date','code','template','mask','timestamp','name','tipo'];

    public function scopeRangos($query,$id_sucrusal,$tipo)
    {
        return $query->where('id_branch',$id_sucrusal)->where('tipo',$tipo);
    }


    public function scopeValoractual($query,$id)
    {
        return $query->where('id',$id);
    }
}
