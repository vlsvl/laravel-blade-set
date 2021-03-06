<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function index()
    {
        User::factory(5)->create();

        $this->actingAs($this->createUser('admin'));

        $response = $this->get('/admin/user');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function edit()
    {
        User::factory(3)->create();

        $this->actingAs($this->createUser('admin'));

        $response = $this->get('/admin/user/3/edit');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function respond_404_if_not_existed_edit()
    {
        User::factory(2)->create();

        $this->actingAs($this->createUser('admin'));

        $response = $this->get('/admin/user/4/edit');

        $response->assertStatus(404);
    }
}
