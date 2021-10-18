<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    protected $table = 'correos';

    public function eje()
    {
        return $this->belongsTo(ejes::class);
    }
}
