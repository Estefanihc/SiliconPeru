<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * Prueba que los usuarios invitados no puedan acceder a la lista de productos.
     */
    public function test_guest_access_to_products()
    {
        $this->get('/products')
            ->assertStatus(302) // Código 302 indica redirección
            ->assertRedirect('/login'); // Verifica que redirige a /login
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de creación de productos.
     */
    public function test_guest_access_to_create_product()
    {
        $this->get('/products/create')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la vista de un producto específico.
     */
    public function test_guest_access_to_show_product()
    {
        $this->get('/products/1') // Probar con un ID de producto existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan acceder a la página de edición de productos.
     */
    public function test_guest_access_to_edit_product()
    {
        $this->get('/products/1/edit') // Probar con un ID de producto existente o ficticio
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para crear un producto.
     */
    public function test_guest_access_to_store_product()
    {
        $this->post('/products', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para actualizar un producto.
     */
    public function test_guest_access_to_update_product()
    {
        $this->put('/products/1', [])
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /**
     * Prueba que los usuarios invitados no puedan enviar una solicitud para eliminar un producto.
     */
    /*public function test_guest_access_to_destroy_product()
    {
        $this->delete('/products/1')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }*/
}
