<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','company_id','name','name_full', 'email','password','telephone','direction'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function Empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function scopeCompany($query, $id_company)
    {

        return $query->join('companies', 'users.company_id','=', 'companies.id')->select('companies.*')
            ->where('companies.accounting_id',$id_company)
            ->get();
    }

    public function scopeName($query, $id)
    {

        return $query->select('name')
            ->where('id',$id);
    }

    public function scopeBuscar($query,$name)
    {
        if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }

    }
}
