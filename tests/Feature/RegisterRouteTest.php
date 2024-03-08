<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterRouteTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A register route test.
     */
    public function test_example(): void
    {
        $response = $this->post('/register', [
            'name' => $this->faker->name,
            'country' => [
                'name' => 'Brunei',
                'idd' => '+673'
            ],
            'phone' => '55 111-22-33',
            'email' => $this->faker->email
        ]);

        $response->assertRedirect('/home');
    }
}
