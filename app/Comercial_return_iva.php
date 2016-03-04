<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercial_return_iva extends Model
{
    public $timestamps = false;

    protected $table = 'commercial_return_vats';

    protected $fillable = ['commercial_return_id', 'vat_id','value','timestamp'];



    public function scopeValorIva($query,$valor)
    {


        $dividir= explode(".",$valor);

        $id_iva=$dividir[0];
        $id_compra=$dividir[1];

        $result= $query->where('vat_id',$id_iva)
            ->where('commercial_return_id',$id_compra)
            ->get();

        return $result;

    }
}
