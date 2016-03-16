<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobros_Pagos extends Model
{
      public $timestamps = false;
    
     protected $table = 'commercial_payments';
    
    protected $fillable = [ 'supplier_id','customer_id', 'account_id','currency_rate_id','payment_total',
        'payment_number', 'series','payment_date', 'timestamp'];//



}
