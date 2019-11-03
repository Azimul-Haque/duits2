<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committeetype extends Model
{
    public function committees(){
        return $this->hasMany('App\Committee');
    }

    public $timestamps = false;
}
