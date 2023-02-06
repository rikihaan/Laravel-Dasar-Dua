<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertSeeText('Hello Response')
        ->assertStatus(200);

    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Asep')
            ->assertSeeText('Riki')
            ->assertHeader('Content-Type','Application/json')
            ->assertHeader('Author','Asep Riki')
            ->assertHeader('App','Belajar Laravel');

    }

    public function testView()
    {
        $this->get('/response/type/view')->assertSeeText('Hello Asep Riki');

    }

    public function testJson()
    {
        $this->get('response/type/json')
            ->assertJson(['firstName'=>"Asep",'lastName'=>'Riki']);

    }

    public function testFile()
    {
        $this->get('/response/type/file')->assertHeader('Content-Type','image/png');

    }

    public function testDownload()
    {
        $this->get('response/type/download')
            ->assertDownload('riki.png');

    }


}
