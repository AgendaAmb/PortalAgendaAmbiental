<?php

namespace Tests\Feature;

use App\Models\Auth\Extern;
use App\Models\Auth\Student;
use App\Models\Auth\Worker;
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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGuestCantViewHome()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('panel');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStudentCanViewHome()
    {
        $user = Student::find(262698);
        $user->markEmailAsVerified();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->get('panel');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWorkerCanViewHome()
    {
        $user = Worker::find(13763);
        $user->markEmailAsVerified();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->get('panel');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserRoleCantViewAdminPanel()
    {
        $user = Student::find(262698);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->get('Administracion');

        $response->assertStatus(403);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminRoleCanViewAdminPanel()
    {
        $user = Student::find(262698);
        $user->assignRole('administrator');

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->actingAs($user)
        ->get('Administracion');

        $response->assertStatus(200);
        $user->removeRole('administrator');
    }
}
