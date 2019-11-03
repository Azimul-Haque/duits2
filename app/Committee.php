<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public function committeetype(){
        return $this->belongsTo('App\Committeetype');
    }
}
