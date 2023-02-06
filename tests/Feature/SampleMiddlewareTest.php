<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SampleMiddlewareTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
        $this->get('/middleware/api')->assertStatus(401)
            ->assertSeeText('Access Denied');

    }

    public function testMiddlewareValid()
    {
        $this->withHeader('X-API-AR','riki')->get('middleware/api')
            ->assertSeeText('Success')
            ->assertStatus(200);

    }

}
