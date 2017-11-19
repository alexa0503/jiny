<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function bodies ()
    {
        return $this->hasMany('App\SupportBody','support_id');
    }
}
