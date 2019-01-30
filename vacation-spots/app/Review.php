<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function spots()
    {
        return $this->belongsTo('App\VacationSpot');
    }
}
