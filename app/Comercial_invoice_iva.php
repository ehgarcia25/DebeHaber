<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercial_invoice_iva extends Model
{
    public $timestamps = false;

    protected $table = 'commercial_invoice_vats';

    protected $fillable = ['commercial_invoice_id', 'vat_id','value','timestamp'];

    public function scopegetMontoIva($query,$id){

        return $query->where('commercial_invoice_id',$id);
    }
}
