<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_loads_posts_index()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function it_loads_posts_create()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }
}
