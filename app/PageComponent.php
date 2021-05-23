<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PageComponent extends Pivot
{
    protected $primaryKey = null;
    protected $incrementing = false;
    
    public function getContentsAttribute($value)
    {
        return json_decode($value, true);
    }
}
