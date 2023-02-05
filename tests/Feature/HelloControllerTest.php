<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function testController()
    {
        $this->get('/controller/hello')
            ->assertSeeText("Hello Controller");
    }

    public function testControllerWithDependency()
    {
        $this->get('/controller/hello/Riki')
            ->assertSeeText("Hello Riki");
    }

    public function testRequest()
    {
        $this->get('/controller/hello/request',['Accept'=>'plain/text'])
        ->assertSeeText('/controller/hello/request')
        ->assertSeeText('http://127.0.0.1:8000/controller/hello/request')
        ->assertSeeText('GET')
        ->assertSeeText('plain/text');

    }


}
