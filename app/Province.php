<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//een provincie heeft meerdere steden
class Province extends Model
{
    public function city()
    {
        return $this->hasMany(City::class);
    }
}
