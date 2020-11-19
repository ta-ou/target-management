<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public function author(){
        return $this->belongsTo('App\Models\User');
    }
}
