<?php

namespace App;

use Session;
use Illuminate\Database\Eloquent\Model;

class Grupo_Activos_Fijos extends Model
{
              public $timestamps = false;

     protected $table = 'fixed_asset_groups';

    protected $fillable = ['name', 'coefficient', 'lifespan', 'is_tangible', 'timestamp', 'user_id','company_id'];


    public function scopeget_grupo_activos($query){

      return $query->where('company_id',Session::get('id_empresa'));
    }

}
