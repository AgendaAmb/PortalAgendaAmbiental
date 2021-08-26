<?php

namespace Tests\Feature;

use App\Models\Auth\Student;
use App\Models\Auth\Worker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Test required fields.
     *
     * @return void
     */
    public function testRequiredFields()
    {
        $response = $this->post('register', []);
        $response->assertSessionHasErrors([
            'Nombres',
            'ApellidoP',
            'email',
            'password',
            'passwordR',
            'Pais',
            'Tel',
            'Edad',
            'LugarResidencia',
            'Genero',
            'CorreoAlterno',
        ]);
    }

    /**
     * Test CURP field.
     *
     * @return void
     */
    public function testGeneroField()
    {
        $data = [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'Tel' => 4441113929,
            'CURP' => null,
            'Genero' => 'Un género que no existe'
        ];

        # Verificar que el género sea válido.
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors([ 'Genero' ]);

        # Género válido.
        $data['Genero'] = 'Masculino';
        $response = $this->post('/register', $data);
        $response->assertSessionDoesntHaveErrors([ 'Genero' ]);

        # Valida otros géneros.
        $data['Genero'] = 'Otro';
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors([ 'OtroGenero' ]);
    }


    /**
     * Test CURP field.
     *
     * @return void
     */
    public function testCurpField()
    {
        $data = [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'Tel' => null,
            'CURP' => null,
        ];

        # Solicitar el curp, solo a Mexicanos.
        $response = $this->post('/register', $data);
        $response->assertSessionHasErrors([ 'CURP' ]);

        $data['Pais'] = 'Panamá';
        $response = $this->post('/register', $data);

        $response->assertSessionDoesntHaveErrors([ 'CURP' ]);
    }

    /**
     * Test Tel field.
     *
     * @return void
     */
    public function testTelField()
    {
        # Verificar que el # de teléfono sea numérico.
        $response = $this->post('/register', [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'Panamá',
            'Tel' => '878788fdgdfg',
            'CURP' => null,
        ]);

        $response->assertSessionHasErrors([ 'Tel' ]);

        $response = $this->post('/register', [
            'Nombres' => null,
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'Panamá',
            'Tel' => '4441113929',
            'CURP' => null,
        ]);

        $response->assertSessionDoesntHaveErrors([ 'Tel' ]);
    }

    /**
     * Test that the password field matches with the passwordR field.
     *
     * @return void
     */
    public function testPasswordsMatch()
    {
        # Verificar contraseñas.
        $response = $this->post('/register', [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseñafff',
            'Pais' => 'Panamá',
            'Tel' => null,
            'CURP' => null,
        ]);

        $response->assertSessionHasErrors([ 'passwordR' ]);

        # Solicitar el curp, solo a Mexicanos y verificar contraseñas.
        $response = $this->post('/register', [
            'Nombres' => null,
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'Panamá',
            'Tel' => null,
            'CURP' => null,
        ]);

        $response->assertSessionDoesntHaveErrors([ 'passwordR' ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testStudentRegister()
    {
        # Borra al usuario de prueba, en caso de existir.
        Student::where('email', 'A262698@alumnos.uaslp.mx')->forceDelete();

        $response = $this->post('/register', [
            'Nombres' => 'MIGUEL ANGEL',
            'ApellidoP' => 'MENDEZ',
            'ApellidoM' => 'ORTA',
            'email' => 'A262698@alumnos.uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEOM970906HSPNRG06',
            'LugarResidencia' => 'San Luis Potosí',
            'Edad' => 23,
            'Genero' => 'Masculino',
            'CorreoAlterno' => 'miguel@prueba.com',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testRegisteredStudentIsOnDatabase()
    {
        $this->assertDatabaseHas('students', [
            'email' => 'A262698@alumnos.uaslp.mx',
            'altern_email' => 'miguel@prueba.com',
        ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testRegisteredStudentHasUserRole()
    {
        $user = Student::find(262698);
        $this->assertTrue($user->hasRole('user'));
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testSanitizedStudentRegister()
    {
        # Borra al usuario de prueba, en caso de existir.
        Student::where('email', 'A262698@alumnos.uaslp.mx')->forceDelete();

        $response = $this->post('/register', [
            'Nombres' => 'MAZACOTE',
            'ApellidoP' => 'MENDEZ',
            'ApellidoM' => 'TORTAS',
            'email' => 'A262698@alumnos.uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEOM970906HSPNRG06',
            'LugarResidencia' => 'San Luis Potosí',
            'Genero' => 'Masculino',
            'CorreoAlterno' => 'miguel@prueba.com',
            'Edad' => 23,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testSanitizedRegisteredStudentIsOnDatabase()
    {
        $this->assertDatabaseHas('students', [
            'email' => 'A262698@alumnos.uaslp.mx',
            'name' => 'MIGUEL ANGEL',
            'middlename' => 'MENDEZ',
            'surname' => 'ORTA',
            'altern_email' => 'miguel@prueba.com',
        ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testWorkerRegister()
    {
        # Borra al usuario de prueba, en caso de existir.
        Worker::where('email', 'miguel.mendez@uaslp.mx')->forceDelete();

        $response = $this->post('/register', [
            'Nombres' => 'MIGUEL ANGEL',
            'ApellidoP' => 'MENDEZ',
            'ApellidoM' => 'MONTENEGRO',
            'email' => 'miguel.mendez@uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEMM620528HTSNNG02',
            'LugarResidencia' => 'San Luis Potosí',
            'CorreoAlterno' => 'miguel@prueba.com',
            'Genero' => 'Masculino',    
            'Edad' => 58,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testRegisteredWorkerHasUserRole()
    {
        $user = Worker::find(13763);
        $this->assertTrue($user->hasRole('user'));
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testRegisteredWorkerIsOnDatabase()
    {
        $this->assertDatabaseHas('workers', [
            'email' => 'miguel.mendez@uaslp.mx',
            'altern_email' => 'miguel@prueba.com',
        ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testSanitizedWorkerRegister()
    {
        # Borra al usuario de prueba, en caso de existir.
        Worker::where('email', 'miguel.mendez@uaslp.mx')->forceDelete();

        $response = $this->post('/register', [
            'Nombres' => 'MARIA EUGENIA',
            'ApellidoP' => 'ALMENDAREZ',
            'ApellidoM' => 'GARCIA',
            'email' => 'miguel.mendez@uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CorreoAlterno' => 'miguel@prueba.com',
            'CURP' => 'MEMM620528HTSNNG02',
            'Genero' => 'Masculino',
            'LugarResidencia' => 'San Luis Potosí',
            'Edad' => 58,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testSanitizedRegisteredWorkerIsOnDatabase()
    {
        $this->assertDatabaseHas('workers', [
            'email' => 'miguel.mendez@uaslp.mx',
            'name' => 'MIGUEL ANGEL',
            'middlename' => 'MENDEZ',
            'altern_email' => 'miguel@prueba.com',
            'surname' => 'MONTENEGRO'
        ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testExternRegister()
    {
        # Verificar que el # de teléfono sea numérico.
        $response = $this->post('/register', [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticiooo.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'Uruguay',
            'Tel' => '4441113929',
            'LugarResidencia' => 'Montevideo',
            'CorreoAlterno' => 'miguel@prueba.com',
            'Genero' => 'Masculino',
            'CURP' => null,
            'Edad' => 58,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testExternOnDatabase()
    {
        $this->assertDatabaseHas('externs', [
            'email' => 'email@ficticiooo.com',
            'altern_email' => 'miguel@prueba.com',
        ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testExternDuplicateRegister()
    {
        # Verificar que el # de teléfono sea numérico.
        $response = $this->post('/register', [
            'Nombres' => 'José',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticiooo.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'Uruguay',
            'Tel' => '4441113929',
            'CURP' => null,
        ]);


        $response->assertSessionHasErrors([ 'email' ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testStudentDuplicateRegister()
    {
        # Verificar que el # de teléfono sea numérico.
        $response = $this->post('/register', [
            'Nombres' => 'MIGUEL ANGEL',
            'ApellidoP' => 'MENDEZ',
            'ApellidoM' => 'ORTA',
            'email' => 'A262698@alumnos.uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEOM970906HSPNRG06',
        ]);

        $response->assertSessionHasErrors([ 'email' ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testWorkerDuplicateRegister()
    {
        $response = $this->post('/register', [
            'Nombres' => 'MARIA EUGENIA',
            'ApellidoP' => 'ALMENDAREZ',
            'ApellidoM' => 'GARCIA',
            'email' => 'miguel.mendez@uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEOM970906HSPNRG05',
        ]);

        $response->assertSessionHasErrors([ 'email' ]);
    }

    /**
     * Test register as extern.
     *
     * @return void
     */
    public function testTryRegisterWithDuplicateCurp()
    {
        $response = $this->post('/register', [
            'Nombres' => 'MARIA EUGENIA',
            'ApellidoP' => 'ALMENDAREZ',
            'ApellidoM' => 'GARCIA',
            'email' => 'miguel.mendez@uaslp.mx',
            'Pais' => 'México',
            'Tel' => '4441309851',
            'CURP' => 'MEOM970906HSPNRG06',
        ]);

        $response->assertSessionHasErrors([ 'CURP' ]);
    }
}
