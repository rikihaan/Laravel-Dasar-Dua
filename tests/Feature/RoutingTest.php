<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testBasicRouting()
    {
        $this->get('/pzn')->assertSeeText('Hello PZN')->assertStatus(200);
    }

    public function testRedirect()
    {
        $this->get('/youtube')->assertRedirect('/pzn');

    }

    public function testFallback()
    {
        $this->get('/404')->assertSeeText('Page Not Found');

    }

    public function testRoutingViewNested()
    {
        $this->get('/hello-world')->assertSeeText('Hello World Riki');

    }

    public function testViewWithOutRoute()
    {
        $this->view('hello',['name'=>"Ading"])->assertSeeText("Hello Ading");

    }

    public function testRouteParameter()
    {
        $this->get('/products/1')->assertSeeText('Product 1');
        $this->get('/products/1/item/hp')->assertSeeText('Product Id = 1 item id hp');
    }

    public function testParameterRegex()
    {
        $this->get('/categories/10')->assertSeeText('Categories: 10');
        $this->get('/categories/salah')->assertSeeText('Page Not Found');
    }

    public function testRouteParameterOptional()
    {
        $this->get('/users/10')->assertSeeText('User: 10');
        $this->get('/users/')->assertSeeText('User: 404');

    }

    public function testRoutingConflict()
    {
        $this->get('/conflict/eko')->assertSeeText("Conflict eko");
        $this->get('/conflict/Riki')->assertSeeText('Conflict Riki');

    }

    public function testRouteNamed()
    {
        $this->get('/produk/12345')
            ->assertSeeText('http://localhost/products/12345');

        $this->get('/produk-redirect/1234')
            ->assertRedirect('products/1234');

    }


}
