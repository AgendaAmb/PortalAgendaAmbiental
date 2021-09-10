<?php

namespace App\Traits;

use App\Models\UserWorkshop;
use App\Models\Workshop;

trait WorkshopTrait
{
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function getRegisteredWorkshops()
    {
        $workshops = $this
        ->workshops()
        ->get()
        ->each(function (&$workshop) {

            $workshop->asistenciaUsuario = $workshop->pivot->assisted_to_workshop ?? null;

            if ($workshop->pivot !== null) {
                unset($workshop->pivot);
            }

        });

        return $workshops->toArray();
    }

    /**
     * Devuelve los modelos pivote de los talleres de
     * usuario.
     *
     * @param  array $workshops
     */
    public function workshopPivots()
    {
        return $this->morphMany(UserWorkshop::class, 'user');
    }

    /**
     * Obtiene los módulos a los que está registrado este usuario.
     *
     * @return object
     */
    public function workshops()
    {
        return $this->morphToMany(Workshop::class, 'user', 'user_workshop')
            ->using(UserWorkshop::class)
            ->withPivot('id', 'sent', 'sent_at',);
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

    /**
     * Devuelve todas las unirodadas a las que se registró
     * el usuario.
     *
     * @param  array $workshops
     */
    public function unirodadas()
    {
        return $this
        ->workshops()
        ->tipo('unirodada');
    }

    /**
     * Obtiene la unirodada más reciente, registrada por el
     * usuario.
     *
     * @param  array $workshops
     */
    public function latestUnirodada()
    {
        return $this->unirodadas()->latest()->first();
    }

    /**
     * Obtiene los datos de la última unirodada registrada
     * deñ usuario.
     *
     * @param  array $workshops
     */
    public function latestUnirodadaUser()
    {
        $pivot = $this->workshopPivots()
            ->where('workshop_id', $this->latestUnirodada()->id ?? -1)
            ->first();

        if ($pivot === null)
            return null;

        return $pivot->unirodadaUser(); 
    }
}