<?php

namespace App\Traits;

use App\Models\Event;

trait EventTrait
{
    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function events()
    {
        return $this->morphToMany(Event::class, 'user', 'event_user');
    }


    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param string $module
     * @return bool
     */
    public function hasEvent(string $event)
    {
        return $this
        ->events()
        ->where('name', $event)
        ->count() > 0;
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param  array $workshops
     * @return bool
     */
    public function hasAnyEvent(array $events)
    {
        return $this
        ->events()
        ->whereIn('name', $events)
        ->count() > 0;
    }
}
