<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class FacadesTest extends TestCase
{
    public function testConfig()
    {
        $config= $this->app->make('config');
        $firtsname=$config->get('contoh.author.first');
        $firsname1 = config('contoh.author.first');
        $firsname2 = Config::get('contoh.author.first');
        self::assertEquals($firsname1,$firsname2);
        self::assertEquals($firtsname,$firsname2);

        var_dump($config->all());
        var_dump(Config::all());

    }

    public function testConfigMock()
    {
        Config::shouldReceive('get')->with('contoh.author.first')->andReturn('Riki Keren');
        $firstname = Config::get('contoh.author.first');
        assertEquals("Riki Keren",$firstname);

    }

}
