<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisas extends Model
{
         public $timestamps = false;
    
     protected $table = 'currencies';
    
    protected $fillable = [ 'name', 'code', 'country_id'];


    public function scopeMoneda($query, $id)
    {
        return $query->where('id',$id)->get();
    }

    public function scopeMonedas($query){
     return $query->join('currency_rates', 'currency_rates.currency_id', '=', 'currencies.id')
         ->select('currencies.name', 'currency_rates.id')->groupBy('currency_rates.currency_id')->get();


    }

    public function scopeMiMoneda($query,$id){
        return $query->join('currency_rates', 'currency_rates.currency_id', '=', 'currencies.id')
           ->select('currencies.name','currency_rates.id')
            ->where('currency_rates.id',$id);
    }

    public function scopeDivisas($query)
    {
//        return $query->join('currency_rates', 'currency_rates.currency_id', '=', 'currencies.id')
//            ->select('currencies.name','currencies.id as id_divisa','currencies.code', 'currency_rates.*')
//            ;



    }

    public function getDivisas()
    {
        $divisas =\DB::select("select currencies.name,currencies.code, currencies.id as id_divisa, tablaux.* from mydb.currencies inner join (SELECT T1.* FROM mydb.currency_rates T1
    INNER JOIN
    (SELECT currency_id, MAX(trans_date) min_fecha
      FROM mydb.currency_rates GROUP BY currency_id) T2
     ON T1.currency_id = T2.currency_id AND T1.trans_date = T2.min_fecha
   ORDER BY T1.trans_date) tablaux on currencies.id= tablaux.currency_id");
        return $divisas;
    }

    public function getDivisas1()
    {
        $divisas =\DB::select("select currencies.name, tablaux.id from mydb.currencies inner join (SELECT T1.* FROM mydb.currency_rates T1
    INNER JOIN
    (SELECT currency_id, MAX(trans_date) max_fecha
      FROM mydb.currency_rates GROUP BY currency_id) T2
     ON T1.currency_id = T2.currency_id AND T1.trans_date = T2.max_fecha
   ORDER BY T1.trans_date) tablaux on currencies.id= tablaux.currency_id");
        return $divisas;
    }


    public function getDivisas2($fecha)
    {

        $divisas =\DB::select("select currencies.name, tablaux.id from mydb.currencies inner join (SELECT T1.* FROM mydb.currency_rates T1
    INNER JOIN
    (SELECT currency_id, MAX(trans_date) max_fecha
      FROM mydb.currency_rates  where trans_date <= '$fecha' GROUP BY currency_id) T2
     ON T1.currency_id = T2.currency_id AND T1.trans_date = T2.max_fecha
   ORDER BY T1.trans_date) tablaux on currencies.id= tablaux.currency_id");


        return $divisas;
    }

}
