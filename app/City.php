<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//een stad hoort bij een provincie
class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
