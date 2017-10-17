<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getRouteKeyName()
    {
        return 'alias_name';
    }
    public function blocks()
    {
        return $this->hasMany('App\Block')->orderBy('sort_id', 'ASC');
    }
    public function kvs()
    {
        return $this->hasMany('App\Block')->where('is_posted', 1)->where('name','kv')->orderBy('sort_id', 'ASC');
    }
    public function gallery()
    {
        return $this->hasMany('App\Block')->where('is_posted', 1)->where('name','gallery')->orderBy('sort_id', 'ASC');
    }
    public function graphic()
    {
        return $this->hasMany('App\Block')->where('is_posted', 1)->where('name','graphic')->orderBy('sort_id', 'ASC');
    }
    public function latest()
    {
        return $this->hasMany('App\Block')->where('is_posted', 1)->where('name','latest')->orderBy('sort_id', 'ASC');
    }
}
