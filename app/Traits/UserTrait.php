<?php

namespace App\Traits;
use App\Models\Auth\Worker;
use App\Models\Auth\Student;
use App\Models\Auth\Extern;

trait UserTrait
{
    /**
     * Gets the list of workers of this module
     *
     * @return object
     */
    public function workers()
    {
        return $this->morphedByMany(Worker::class, 'user', 'module_user');
    }

    /**
     * Gets the list of users of this module
     *
     * @return object
     */
    public function students()
    {
        return $this->morphedByMany(Student::class, 'user', 'module_user');
    }

    /**
     * Gets the list of externs of this module
     *
     * @return object
     */
    public function externs()
    {
        return $this->morphedByMany(Extern::class, 'user', 'module_user');
    }

    /**
     * Gets the list of all users of this module
     *
     * @return object
     */
    public function users()
    {
        $workers = $this->workers;
        $students = $this->students;
        $externs = $this->externs;

        return $workers->merge($students)->merge($externs);
    }

    /**
     * Gets the api list of all users of this module
     *
     * @return object
     */
    public function apiUsers()
    {
        $columns = [ 'id', 'name', 'middlename', 'surname' ];

        # Trabajadores de la UASLP.
        $workers = $this->workers()('pivot')->select($columns)->get();

        # Estudiantes de la UASLP.
        $students = $this->students()->select($columns)->get();

        # Externos.
        $externs = $this->externs()->select($columns)->get();

        return $workers->merge($students)->merge($externs);
    }
}