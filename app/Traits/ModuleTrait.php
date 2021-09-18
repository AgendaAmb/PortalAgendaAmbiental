<?php

namespace App\Traits;

use App\Models\Module;
use Carbon\Carbon;

trait ModuleTrait
{
    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param string $module
     * @return bool
     */
    public function hasModule(string $module)
    {
        return $this
        ->userModules()
        ->where('name', $module)
        ->count() > 0;
    }

    /**
     * Determina si el usuario está registrado en el módulo
     *
     * @param Module $module
     * @return bool
     */
    public function hasAnyModule(array $modules)
    {
        return $this
        ->userModules()
        ->whereIn('name', $modules)
        ->count() > 0;
    }

    /**
     * Asocia al usuario un módulo.
     *
     * @param Module $module
     * @return void
     */
    public function attachModule(Module $module)
    {
        $this->userModules()->attach($module->id, ['user_type' => static::class]);
    }

    /**
     * Desasocia al usuario un módulo.
     *
     * @param Module $module
     * @return void
     */
    public function detachModule(Module $module)
    {
        $this->userModules()->detach($module->id);
    }

    /**
     * Verifica el correo electrónico del usuario en
     * el módulo indicado.
     *
     * @param Module $module
     * @return void
     */
    public function verifyEmailOn(Module $module)
    {
        $this->userModules()
             ->updateExistingPivot($module->id, [
            'email_verified_at' => Carbon::now()
        ]);
    }

    /**
     * Verifica el correo electrónico del usuario en
     * el módulo indicado.
     *
     * @param Module $module
     * @return void
     */
    public function hasEmailVerifiedOn(Module $module)
    {
        return $this
                ->userModules()
                ->wherePivot('module_id', $module->id)
                ->wherePivotNotNull('email_verified_at')
                ->get() !== null;
    }
}