<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Divisas_rate extends Model
{
       public $timestamps = false;
    
     protected $table = 'currency_rates';
    
    protected $fillable = [  'currency_id', 'country_id','buy_rate','sell_rate', 'trans_date']; //



    public function scopeTaza($query,$id){
<<<<<<< HEAD
        $result= $query->where('id',$id)->where('buy_rate','!=',1);
        return $result;
    }




=======
        $result= $query->find($id);
        return $result;
    }

>>>>>>> origin/master
    public function scopeTaza_fecha($query,$fecha){
        return $query->where('trans_date',$fecha);
    }


    public function scopegetTaza($query,$id){

$fecha=$this->_data_first_month_day();

        $result= $query->where('currency_id',$id)
            ->where('trans_date','>=', "$fecha")
            ->get();
        return $result;
    }

    public function scopeBuscar($query,$name)
    {
        if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }

    }

    /** Actual month last day **/
    function _data_last_month_day() {
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0,0,0, $month+1, 0, $year));

        return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
    }

    /** Actual month first day **/
    function _data_first_month_day() {
        $month = date('m');
        $year = date('Y');
        return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
    }
}
