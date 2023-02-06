<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
            ->assertCookie('User-Id','asepriki')
            ->assertCookie('Is-Member',true);
    }

    public function testGetCookie()
    {
        // lansung tanpa set
//        $this->get('cookie/get')->assertJson([
//            'UserId'=>'asepriki',
//            'IsMember'=>true
//        ]);

        // with set affter set cookie
        $this->withCookie('User-Id','asepriki');
        $this->withCookie('Is-Member',true);
        $this->get('/cookie/get')->assertJson([
            'userId'=>'asepriki',
            'IsMember'=>true
        ]);

    }

    public function testClearCookie()
    {
        $this->get('/cookie/clear');
        $this->get('cookie/get')
            ->assertJson([
                'userId'=>'Guest',
                'IsMember'=>false
            ]);

    }


}
