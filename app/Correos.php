<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correos extends Model
{
    protected $table = 'Correos';

    public function eje()
    {
        return $this->belongsTo(eje::class);
    }
}
