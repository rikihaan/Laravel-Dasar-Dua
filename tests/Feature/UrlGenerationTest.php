<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlGenerationTest extends TestCase
{
    public function testCurrentUrl()
    {
        $this->get('/url/current?name=riki')
            ->assertSeeText('/url/current?name=riki');
    }

}
