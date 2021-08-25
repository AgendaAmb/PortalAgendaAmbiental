<?php

namespace Tests\Feature;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Extern_Login()
    {
        # Verificar inicio de sesión como externo.
        $response = $this->post('/login', [
            'email' => 'email@ficticiooo.com',
            'password' => 'contraseña'
        ]);

        $response->assertSessionHasNoErrors();
        Extern::where('email', 'email@ficticiooo.com')->forceDelete();
    }
}
