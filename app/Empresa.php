<?php namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    
    public $timestamps = false;
    
    protected $table = 'companies';
    
    protected $fillable = ['name','alias','gov_code','country_id','app_subscription_id','cycle_id', 'audit_id','accounting_id',
    'razon_social','telefono','direccion','email'];


    public function scopeCompania($query,$id){

        return $query->where('accounting_id','=',$id)->get();

    }

    public function scopeComp($query)
    {
        $consulta=$query->where('active','=',1)->get();

        return $consulta;
    }

    public function scopeOtrasCompnias($query,$id){

    return $query->where('id','!=',$id)->paginate(1000);

}

    public function scopeEmpresas($query){

        return $query->lists();

    }

    public function scopeBuscar($query,$name)
    {
        if(trim($name)!=""){
            return
                $query->where('name','LIKE',"%$name%")->orwhere('gov_code','LIKE',"%$name%")->orwhere('alias','LIKE',"%$name%");

        }

    }

    public function scopeBuscarNew($query,$name)
    {
        if(trim($name)!=""){
            return $query->join('relaciones as r','r.supplier_id','=','companies.id')->where('r.active','!=',0)->where(function ($query) use ($name){
                $query->where('name','LIKE',"%$name%")->orwhere('gov_code','LIKE',"%$name%")->orwhere('alias','LIKE',"%$name%");
            });

        }

    }

    public function scopegetEmpresa_por_codigo($query,$codigo){
        return $query->where('gov_code',$codigo);
    }
}