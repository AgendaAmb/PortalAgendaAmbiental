<?php

namespace App\Traits;

use App\Models\Workshop;
use Carbon\Carbon;

trait WorkshopTrait
{
    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops()
    {
        return $this->morphToMany(Workshop::class, 'user', 'user_workshop');
    }


    /**
     * Determina si el usuario está registrado en el curso
     *
     * @param string $workshop
     * @return bool
     */
    public function hasWorkshop(string $workshop)
    {
        return $this
        ->userModules()
        ->where('name', $workshop)
        ->count() > 0;
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param array $workshops
     * @return bool
     */
    public function hasAnyWorkshops(array $workshops)
    {
        return $this
        ->userModules()
        ->whereIn('name', $workshops)
        ->count() > 0;
    }
}