<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario_Template extends Model
{
           public $timestamps = false;
    
     protected $table = 'journal_templates';
    
    protected $fillable = ['company_id', 'name',  
        'is_active'];//
    ////
    
    
      public function details()
    {
        return $this->hasOne('App\Diario_Template_Detalles');
    }
}
