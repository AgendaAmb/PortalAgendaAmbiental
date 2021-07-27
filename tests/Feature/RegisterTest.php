<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_register()
    {
        $response = $this->post('/register', []);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_name()
    {
        $response = $this->post('/register', [
            'Nombres' => null,
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'CURP' => 'PEPE333333UDFHTR04', 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_appellido_paterno()
    {
        $response = $this->post('/register', [
            'Nombres' => 'Pepe',
            'ApellidoP' => null,
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'CURP' => 'PEPE333333UDFHTR04', 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_email()
    {
        $response = $this->post('/register', [
            'Nombres' => 'Pepe',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio..com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'CURP' => 'MEOM970609HSPNRG06', 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_invalid_curp_format()
    {
        $response = $this->post('/register', [
            'Nombres' => 'Pepe',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseña',
            'Pais' => 'México',
            'CURP' => 'PEPE333333UDFHTR04', 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_password_mismatch()
    {
        $response = $this->post('/register', [
            'Nombres' => 'Pepe',
            'ApellidoP' => 'Mujica',
            'ApellidoM' => null,
            'email' => 'email@ficticio.com',
            'password' => 'contraseña',
            'passwordR' => 'contraseñaf',
            'Pais' => 'México',
            'CURP' => 'PEPE333333UDFHTR04', 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }
}
