<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionCategory extends Model
{
    public function solutions ()
    {
        return $this->hasMany('App\Solution','category_id');
    }
}
