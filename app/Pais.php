<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public $timestamps = false;

    protected $table = 'countries';

    protected $fillable = ['name','code'];// //


}
