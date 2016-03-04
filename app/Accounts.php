<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public $timestamps = false;

    protected $table = 'accounts';

    protected $fillable = ['company_id', 'name','account_code'];



    public function scopeAccount($query, $id){

        return $query->where('company_id',$id);
    }

    public function scopeNombre($query,$id){
        return $query->find($id);
    }

    public function scopeAllCuentas($query){
        return $query->all();

                    }
}
