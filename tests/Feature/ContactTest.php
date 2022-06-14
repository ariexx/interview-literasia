<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function create_contact()
    {
        $response = $this->post('/api/contact/add', [
            'name' => 'John Doe',
            'number' => '123456789'
        ]);
        $response->assertStatus(201);
    }

    /**
     * @test
     */

    public function get_all_contacts()
    {
        $this->get('/api/contacts')->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_contact_by_id()
    {
        $this->get('/api/contact/1')->assertStatus(200);
    }

    /**
     * @test
     */
    public function update_contact()
    {
        $this->put('/api/contact/edit/1', [
            'name' => 'John Doe',
            'number' => '123456789',
            'is_active' => 1
        ])->assertStatus(200);
    }

    public function delete_contact()
    {
        $this->delete('/api/contact/delete/1')->assertStatus(200);
    }
}
