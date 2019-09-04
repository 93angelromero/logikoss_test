<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuariosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_loads_index()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
    }

    public function it_loads_create()
    {
        $response = $this->get('/usuarios/create');

        $response->assertStatus(200);
    }
}
