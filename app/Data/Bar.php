<?php

   namespace App\Data;

   class Bar
   {
       public Foo $foo;

       /**
        * @param Foo $foo
        */
       public function __construct(Foo $foo)
       {
           $this->foo = $foo;
       }

       public function Bar():String{
           return $this->foo->foo() ." and Bar";
       }


   }
