<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportBody extends Model
{
    public function support()
    {
        return $this->belongsTo('App\Support');
    }
}
