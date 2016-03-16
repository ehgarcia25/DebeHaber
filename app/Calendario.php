<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{

    public $timestamps = false;

    protected $table = 'calendar';

    protected $fillable = ['user_id', 'start',
        'end','company_id','title','allDay'];
}
