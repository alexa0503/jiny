<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolutionCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function solutions ()
    {
        return $this->hasMany('App\Solution','category_id');
    }
}
