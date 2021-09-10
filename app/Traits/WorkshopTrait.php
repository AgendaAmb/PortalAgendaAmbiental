<?php

namespace App\Traits;

use App\Models\UnirodadaUser;
use App\Models\UserWorkshop;
use App\Models\Workshop;
use Carbon\Carbon;

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
     * Devuelve los datos registrados en cada unirodada del usuario.
     *
     * @return object
     */
    public function unirodadasUser()
    {
        return $this->hasManyThrough(
            UnirodadaUser::class,
            UserWorkshop::class,
            'user_id',
            'user_workshop_id'

        )->where(
            'user_type', static::class
        );
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
     * Registra el curso/taller de usuario como pagado
     *
     * @param int $workshop
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
     * Registra la asistencia al curso / taller
     *
     * @param int $workshop
     * @param bool $sent
     * @return void
     */
    public function setWorkshopNotificationAsSent($workshop_id, $sent)
    {
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param string $module
     * @return void
     */
    public function setWorkshopAsPaid($workshop_id)
    {
        $this->workshops()->updateExistingPivot($workshop_id, [
            'paid' => true,
            'paid_at' => Carbon::now()->timezone('America/Mexico_City')
        ]);
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
    public function latestUnirodadaUserData()
    {
        # Modelo de la unirodada más reciente.
        $unirodada = $this->latestUnirodada();

        # Clave primaria de la relación intermedia.
        $pivot_id = $unirodada->pivot->id ?? -1;

        return $this->unirodadasUser()
            ->where('user_workshop_id', $pivot_id)
            ->first();
    }
}
