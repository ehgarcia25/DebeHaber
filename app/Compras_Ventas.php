<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Compras_Ventas extends Model
{
    
     public $timestamps = false;
    
     protected $table = 'commercial_invoices';
    
<<<<<<< HEAD
    protected $fillable = ['id_branch', 'costcenter_id', 'currency_rate_id',
=======
    protected $fillable = ['customer_id', 'customer_branch_id','supplier_id', 'supplier_branch_id', 'costcenter_id', 'currency_rate_id', 
>>>>>>> origin/master
        'invoice_total', 'invoice_number', 'invoice_code', 'payment_condition', 'series'
        ,'invoice_date', 'timestamp','is_accounted_customer','is_accounted_supplier','id_relaciones'];



public function scopeCompra($query, $id){

    return $query->where('id',$id)->get();
}

    public function scopeAprobarCompra($query,$id){

        $query->where('id',$id)->update(['is_accounted_customer',1]);
    }

    public function scopeMisCompras($query,$cliente){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_invoices.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_invoices.id_relaciones')
            ->join('companies as c',function($join) use ($cliente){
                $join->on('c.id', '=', 'r.supplier_id')
                    ->where('r.customer_id','=',$cliente);
            })
            ->select('commercial_invoices.*', 'name','gov_code', 'currency_rates.currency_id');
    }

    public function scopeMisVentas($query,$proveedor){

        $query ->join('currency_rates', 'currency_rates.id', '=', 'commercial_invoices.currency_rate_id')
            ->join('relaciones as r', 'r.id', '=', 'commercial_invoices.id_relaciones')
            ->join('companies as c',function($join) use ($proveedor){
                $join->on('c.id', '=', 'r.customer_id')
                    ->where('r.supplier_id','=',$proveedor);
            })
            ->select('commercial_invoices.*', 'name','gov_code', 'currency_rates.currency_id');
    }

    public function scopegetTimbrado($query,$id_relacion,$fecha)
    {
        return $query->where('id_relaciones',$id_relacion)
<<<<<<< HEAD
            ->where('code_date','>=',$fecha)
            ->select('invoice_code');
    }

    public function scopeget_fecha_vencimiento($query,$codigo){

        return $query->where('invoice_code',$codigo)->select('invoice_code','code_date','id');
    }

=======
            ->where('code_date','<=',$fecha)
            ->select('invoice_code');
    }

>>>>>>> origin/master
    public function relaciones()
    {
        return $this->hasMany('App\Relaciones');
    }
}