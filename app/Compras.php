<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    
     public $timestamps = false;
    
     protected $table = 'commercial_invoices';
    
    protected $fillable = ['id_branch' , 'costcenter_id', 'currency_rate_id',
        'invoice_total', 'invoice_number', 'invoice_code', 'payment_condition', 'series'
        ,'invoice_date', 'timestamp','is_accounted_customer','id_relaciones'];



public function scopeCompra($query, $id){

    return $query->where('id',$id)->get();
}

    public function scopeAprobarCompra($query,$id){

        $query->where('id',$id)->update(['is_accounted_customer',1]);
    }
}