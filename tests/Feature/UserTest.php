<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $response = $this->post('/register', [
            'name'=>'Prueba',
            'email'=>'prueba1@gmail.com',
            'password'=>'12345678',
            'password_confirmation'=>'12345678'
        ]
    );

        $response->assertRedirect('/');
    }
    public function test_Perfil(): void
    {
        $response = $this->post('/perfil', [
            'name'=>'Cambio',
            'email'=>'prueba5@gmail.com',
        ]
    );

        $response->assertRedirect();
    }
    public function test_Tarea(): void
    {
        $response = $this->post('/tareas/create', [
            'nombre_actividad'=>'Cambio',
            'descripcion_actividad'=>'asdasfdsgfdfghdfg',
        ]
    );

        $response->assertRedirect();
    }
    public function test_Grupo(): void
    {
        $response = $this->post('/grupos/create', [
            'nombre_grupo'=>'Cambio',
            'emdescripcion_grupoail'=>'asfsdfadsf',
        ]
    );

        $response->assertRedirect();
    }
}
