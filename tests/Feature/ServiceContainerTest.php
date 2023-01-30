<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServicesIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testBind()
    {
        $this->app->bind(Person::class,function(){
            return new Person("Asep","Riki");
        });

        $person1= $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Asep',$person1->firstname);
        self::assertEquals("Asep",$person2->firstname);
        self::assertEquals("Riki",$person1->lastname);
        self::assertEquals("Riki",$person2->lastname);
        self::assertNotSame($person1,$person2);

    }

    ///sigletone
    public function testSingleTone()
    {
        $this->app->singleton(Person::class,function (){
            return new Person("Rendi","Apriandi");
        });

        $person1 = $this->app->make(Person::class);
        $person2 =$this->app->make(Person::class);

        self::assertEquals("Rendi",$person1->firstname);
        self::assertEquals("Rendi",$person2->firstname);
        self::assertEquals("Apriandi",$person1->lastname);
        self::assertEquals("Apriandi",$person2->lastname);
        self::assertSame($person2,$person1);

    }

    public function testInstance()
    {
        $objectPerson = new Person("Dadang","Komara");
        $this->app->instance(Person::class,$objectPerson);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Dadang",$person1->firstname);
        self::assertEquals("Komara",$person1->lastname);
        self::assertEquals("Dadang",$person2->firstname);
        self::assertEquals("Komara",$person2->lastname);
        self::assertSame($person1,$person2);
        self::assertSame($objectPerson,$person1);

    }

    public function testDependencyInjection()
    {
       $this->app->singleton(Foo::class,function(){
            return new Foo();
        });

        $foo = $this->app->make(Foo::class);
//        laravel akan mencari dipendency yang sesuai dari object yang ada
        $bar = $this->app->make(Bar::class);

        self::assertEquals("Foo and Bar", $bar->bar());
        self::assertSame($foo,$bar->foo);

    }

    public function testDependencyInjectionInClosure()
    {

        $this->app->singleton(Bar::class,function($app){
            return new Bar($app->make(Foo::class));
        });

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        self::assertSame($bar1,$bar2);

    }

    public function testHelloServise()
    {
        $this->app->singleton(HelloService::class,HelloServicesIndonesia::class);
        $helloService= $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        self::assertEquals("Hello Riki",$helloService->hello("Riki"));
        self::assertSame($helloService,$helloService2);

    }

    public function testInterfaceToClass()
    {
        $this->app->singleton(HelloService::class,function(){
            return new HelloServicesIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);
        self::assertEquals("Hello Reza",$helloService->hello("Reza"));

    }


}
