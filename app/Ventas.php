<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    
     public $timestamps = false;
     protected $table = 'commercial_invoices';
    
    protected $fillable = ['customer_id', 'customer_branch_id','supplier_id', 'supplier_branch_id', 'costcenter_id', 'currency_rate_id', 
        'invoice_total', 'invoice_number', 'invoice_code', 'payment_condition', 'series'
        ,'invoice_date', 'timestamp','is_accounted_supplier'];
}