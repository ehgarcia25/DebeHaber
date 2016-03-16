<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public $timestamps = false;

    protected $table = 'accounts';

    protected $fillable = ['company_id', 'name','account_code'];



    public function scopeAccount($query, $id){

<<<<<<< HEAD
        return $query->where('company_id',$id)->get();
=======
        return $query->where('company_id',$id);
>>>>>>> origin/master
    }

    public function scopeNombre($query,$id){
        return $query->find($id);
    }

    public function scopeAllCuentas($query){
        return $query->all();

                    }
}
