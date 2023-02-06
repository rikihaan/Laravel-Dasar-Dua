<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirect()
    {
        $this->get('/redirect/from')
            ->assertRedirect('/redirect/to');
    }

    public function testRedirectName()
    {

        $this->get('/redirect/name')->assertRedirect('/redirect/hello/Riki');
    }

    public function testRedirectActionController()
    {
        $this->get('/redirect/action')->assertRedirect('/redirect/hello/Jajang');

    }

    public function testRedirectAway()
    {
        $this->get('/redirect/away')
            ->assertRedirect('https://www.youtube.com/watch?v=2NZe05C0OCQ');

    }

}
