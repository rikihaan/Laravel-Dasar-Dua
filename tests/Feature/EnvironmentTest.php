<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $youtube = env('YOUTUBE');
        self::assertEquals('Programmer Zaman Now',$youtube);
    }

    public function testDefaultValueTest()
    {
        $author = env("AUTHOR","ASEP RIKI");
        self::assertEquals('ASEP RIKI',$author);

    }

    public function testEnvironment()
    {
        if(App::environment('testing')){
            echo "LOGIC IN TESTING ENV".PHP_EOL;
            self::assertTrue(true);
        }

    }


}
