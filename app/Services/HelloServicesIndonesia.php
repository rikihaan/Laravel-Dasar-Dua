<?php

namespace App\Services;

class HelloServicesIndonesia implements HelloService
{
    function hello(string $name): string
    {
       return "Hello $name";
    }

}
