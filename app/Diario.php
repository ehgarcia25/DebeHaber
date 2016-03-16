<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
          public $timestamps = false;
    
     protected $table = 'journals';
    
    protected $fillable = ['cycle_id', 'journal_template_id', 'trans_date', 'timestamp',  
        'user_id','company_id'];
 
}
