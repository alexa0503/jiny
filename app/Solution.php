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
    public function items()
    {
        return $this->belongsToMany('App\Item', 'solution_has_items', 'solution_id', 'item_id');
    }
    public function getItemIdsAttribute()
    {
        $ids = $this->items->map(function ($item) {
            return $item->id;
        })->toArray();
        if (null == $ids) {
            return [];
        }
        return $ids;
    }
    /*
    public function items()
    {
        return $this->morphedByMany('App\Solution', 'solution_has_items');
    }
    */
}
