<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario_Detalles extends Model
{
      public $timestamps = false;
    
     protected $table = 'journal_details';
    
    protected $fillable = ['debit', 'credit', 'journal_id', 'chart_id',  
        'timestamp'];
}
