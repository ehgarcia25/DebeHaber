<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    public $timestamps = false;

    protected $table = 'cost_centers';



    protected $fillable = ['name','company_id','is_product','is_fixedasset','is_expense'];//
}
