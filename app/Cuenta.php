<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cuenta extends Model
{
        public $timestamps = false;
    
     protected $table = 'charts';
    
   
     
    protected $fillable = ['char_id', 'country_id','company_id','vat_id','fixed_asset_group_id','cost_center_id', 'code', 'name', 'chart_type', 
<<<<<<< HEAD
        'chart_subtype', 'level','my_company_id','charts_generic','account_id'];//
=======
        'chart_subtype', 'level','my_company_id','charts_generic'];//
>>>>>>> origin/master


    public function scopeCuentas_Sin_Pres($query,$chart_id)
    {
        return $query->where('id','!=',$chart_id)->get();
    }

    public function scopeNivel1($query)
    {
        return $query->where('level','=',1)->get();
    }
    public function scopeNivel2($query)
    {
        return $query->where('level','=',2)->get();
    }
    public function scopeNivel3($query)
    {
        return $query->where('level','=',3)->get();
    }


    public function scopePadre($query,$padre)
    {
        if($padre==0)
        {
            $result=$query->where('chart_id','=',null)->where(
                function($query){
                    $query->where('my_company_id', \Session::get('id_empresa'))->orwhere('charts_generic','1')->get();
                }
            )->get();

            return  $result;
        }
        else{
            $result=$query->where('chart_id','=',$padre)->where(
                function($query){
                    $query->where('my_company_id', \Session::get('id_empresa'))->orwhere('charts_generic','1')->get();
                }
            )->get();


            return  $result;


        }

    }
<<<<<<< HEAD

    public function scopeMiPadre($query,$id){
        return $query->where('id',$id)->select('id','code','chart_type');
    }
=======
>>>>>>> origin/master
}
