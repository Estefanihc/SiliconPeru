<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Crear un usuario y actuar como él
        $user = User::factory()->create();

        // Actuar como el usuario
        $this->actingAs($user);

        // Acceder a la ruta
        $response = $this->get('/'); // La ruta que estás probando

        // Verificar que la respuesta sea 200
        $response->assertStatus(200);
    }
}
