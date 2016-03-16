<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario_Template_Detalles extends Model
{
          public $timestamps = false;
    
     protected $table = 'journal_template_detail';
    
    protected $fillable = ['journal_templates_id','chart_id', 'is_debit', 
        'coefficient'];//
    // //
}
