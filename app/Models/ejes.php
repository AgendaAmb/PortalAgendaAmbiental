<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ejes extends Model
{
    public function Correos()
    {
        return $this->hasMany(Correos::class,'id');
    }
}
