<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    public $timestamps = false;

    protected $table = 'vats';

    protected $fillable = ['name', 'coeficient','country_id'];


    public function scopeIva($query,$id){

        return $query->where('country_id',$id)->get();
    }



}
