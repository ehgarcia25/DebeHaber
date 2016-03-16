<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    
     public $timestamps = false;
     protected $table = 'commercial_invoices';
    
    protected $fillable = ['id_branch', 'costcenter_id', 'currency_rate_id',
        'invoice_total', 'invoice_number', 'invoice_code', 'payment_condition', 'series'
        ,'invoice_date', 'timestamp','is_accounted_supplier','id_relaciones'];
}