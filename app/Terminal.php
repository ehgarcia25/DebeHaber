<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    public $timestamps = false;

    protected $table = 'terminal';

    protected $fillable = ['id_company','name','code','id_user','id_branch','timestamp'];


    public function scopeTerminal($query,$id_sucrusal)
    {
        return $query->where('id_branch',$id_sucrusal)->lists('name','id');
    }

    public function scopeTerminalCode($query,$id)
    {
        return $query->where('id',$id);
    }

    public function scopeTerminales($query,$id)
    {
        return $query->where('id_company',$id)->get();
    }
}
