<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Ciclos extends Model
{
    
          public $timestamps = false;
    
     protected $table = 'cycles';
    
    protected $fillable = ['name', 'start_date', 
        'end_date','company_id'];//
    //


    public function scopeAnno($query,$fecha){


        $a=$query->where('start_date',$fecha)->select('start_date')->get();

        return $a;

    }

    public function scopePeriodo($query,$id){


     return $query->find($id);



    }
}
