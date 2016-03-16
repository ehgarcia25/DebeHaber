<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timbrado extends Model
{
    public $timestamps = false;

    protected $table = 'timbrado';

    protected $fillable = ['company_id','name', 'value'];


    public function scopegetTimbrado($query,$id,$fecha)
    {

        return $query->where('company_id',$id)->where('end_date','>',$fecha)->get();
    }
}
