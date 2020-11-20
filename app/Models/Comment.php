<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function target()
    {
        return $this->belongsTo('App\Models\Target');
    }
}
