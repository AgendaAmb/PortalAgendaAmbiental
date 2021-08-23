<?php

namespace Tests\Feature;

use App\Models\Auth\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class WorkshopTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterWorkshop()
    {
        $user = Student::find(262698);

        $response = $this->post('/workshops');
        $response->assertStatus(302);
        
        $response = $this->actingAs($user)->post('/workshops');
        $response->assertStatus(422);

        $response = $this->actingAs($user)->post('/workshops', [
            'CP' => '78280',
            'Ocupacion' => 'required',
            'LugarResidencia' => '78280',
            'cursosInscritosMMUS' => null
        ]);

        $response->assertStatus(422);
    }
}
