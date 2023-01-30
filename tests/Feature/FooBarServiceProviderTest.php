<?php

namespace Tests\Feature;

use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    public function testCreateDependecy()
    {
        $foo =$this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo",$foo->foo());
        self::assertEquals("Foo",$foo->foo());
        self::assertNotSame($foo,$foo2);

    }

}
