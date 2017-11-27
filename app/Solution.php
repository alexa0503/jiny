<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $casts = [
        'videos'=>'array',
    ];
    public function category()
    {
        return $this->belongsTo('App\SolutionCategory');
    }
}
