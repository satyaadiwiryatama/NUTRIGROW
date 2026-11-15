<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/isi-piringku/ibu-hamil');
        $response->assertStatus(200);
        $response->assertSee('Makanan pokok');
        $response->assertSee('Air putih');

        $response = $this->get('/isi-piringku/ibu-menyusui');
        $response->assertStatus(200);
        $response->assertSee('Makanan pokok');
        $response->assertSee('Air putih');

        $response = $this->get('/mpasi/6-8');
        $response->assertStatus(200);

        $response = $this->get('/about-me');
        $response->assertStatus(200);
    }
}
