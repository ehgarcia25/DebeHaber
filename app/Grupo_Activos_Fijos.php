<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_Activos_Fijos extends Model
{
              public $timestamps = false;
    
     protected $table = 'fixed_asset_groups';
    
    protected $fillable = ['name', 'coefficient', 'lifespan', 'is_tangible', 'timestamp', 'user_id'];
    
    
  
}
