<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemAttributes()
    {
        return $this->hasMany('App\ItemAttribute');
    }
    public function getItemAttribute($name)
    {
        $attributes = $this->itemAttributes->filter(function($value, $key) use($name){
            return $value->name == $name;
        })->all();
        return count($attributes) > 0 ? array_values($attributes)[0] : (object)(['name'=>'','body'=>'']);
    }
    public function getAttributeBody($name)
    {
        $obj = $this->getItemAttribute($name);
        return $obj->body;
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
