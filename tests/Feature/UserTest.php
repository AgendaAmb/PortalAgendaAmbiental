<?php

namespace Tests\Feature;


use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_empty_user_login()
    {
        $response = $this->post('/login', []);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invalid_user_login()
    {
        $response = $this->post('/login', [
            'A262698@alumnos.uaslp.mxx',
            'Mickymlr22%%%%'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_email_login()
    {
        $response = $this->post('/login', [
            'A262698@alumnos.uaslp.mx',
            'Mickeymo970609sep%$'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
