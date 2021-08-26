<?php

namespace Tests\Feature;

use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use App\Models\Workshop;
use Tests\TestCase;

class WorkshopTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTryRegisterWorkshopAsGuest()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/RegistrarTallerUsuario');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTryRegisterNoCourses()
    {
        $user = Student::find(262698);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
        ]);

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterInvalidEvent()
    {
        $user = Student::find(262698);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
            'TipoEvento' => 'embaraginados',
        ]);

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterUnirodadaAsStudent()
    {
        $user = Student::find(262698);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
            'TipoEvento' => 'unirodada',
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterCoursesAsStudent()
    {
        $user = Student::find(262698);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
            'cursosInscritosMMUS' => [
                'curso sostenibilidad',
                'curso movilidad y urbanismo',
                'curso conduce con100te'
            ],
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCoursesWereAttachedToStudent()
    {
        $user = Student::find(262698);

        # Obtiene los cursos registrados.
        $this->assertTrue($user->workshops()->tipo('curso')->count() > 0);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUnirodadaWasAttachedToStudent()
    {
        $user = Student::find(262698);

        # Obtiene el último evento de la unirodada.
        $workshop = Workshop::tipo('unirodada')->latest('created_at')->first();

        $this->assertTrue($workshop !== null);
        $this->assertTrue($user->workshops()->tipo('unirodada')->where('id', $workshop->id)->count() > 0);

        # Elimina todos los cursos/talleres/eventos
        $user->workshops()->detach();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterUnirodadaAsWorker()
    {
        $user = Worker::find(13763);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
            'TipoEvento' => 'unirodada',
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterCoursesAsWorker()
    {
        $user = Worker::find(13763);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->post('/RegistrarTallerUsuario', [
            'NombreContacto' => 'Jaqueline Orta Lara',
            'CelularContacto' => 4441113929,
            'InteresAsistencia' => 'No',
            'Ocupacion' => 'Estudiante',
            'GrupoEtnico' => null,
            'CondicionSalud' => [ 'Excelente' ],
            'cursosInscritosMMUS' => [
                'curso sostenibilidad',
                'curso movilidad y urbanismo',
                'curso conduce con100te'
            ],
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCoursesWereAttachedToWorker()
    {
        $user = Worker::find(13763);

        # Obtiene los cursos registrados.
        $this->assertTrue($user->workshops()->tipo('curso')->count() > 0);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUnirodadaWasAttachedToWorker()
    {
        $user = Worker::find(13763);

        # Obtiene el último evento de la unirodada.
        $workshop = Workshop::tipo('unirodada')->latest('created_at')->first();

        $this->assertTrue($workshop !== null);
        $this->assertTrue($user->workshops()->tipo('unirodada')->where('id', $workshop->id)->count() > 0);

        # Elimina todos los cursos/talleres/eventos
        $user->workshops()->detach();
    }
}
