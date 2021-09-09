<?php

namespace App\Traits;

use App\Models\Workshop;

trait WorkshopTrait
{
    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops()
    {

        return $this->morphToMany(Workshop::class, 'user', 'user_workshop')
                    ->withPivot('assisted_to_workshop', 'sent', 'sent_at');
    }


    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param string $module
     * @return bool
     */
    public function hasWorkshop(string $workshop)
    {
        return $this
        ->workshops()
        ->where('name', $workshop)
        ->count() > 0;
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param  array $workshops
     * @return bool
     */
    public function hasAnyWorkshop(array $workshops)
    {
        return $this
        ->workshops()
        ->whereIn('name', $workshops)
        ->count() > 0;
    }
}
