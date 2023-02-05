<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{

    public function testInput()
    {
        $this->get('/input/hello?name=Riki')->assertSeeText('Hello Riki');
        $this->post('/input/hello',['name'=>'Rezza'])
            ->assertSeeText('Hello Reza');
    }

    // test nested
    public function testInputNested()
    {
        $this->post('/input/hello/nested',['name'=>['first'=>'Rezza Mahardiansyah']])->assertSeeText('Hello Rezza Mahardiansyah');

    }

    //test input ambil semua input
    public function testInputGetAll()
    {
        $this->post('/input/hello/helloInput',[
            'name'=>[
                'first'=>"Riki",
                'last'=>'Hari'
            ]
        ])->assertSeeText('name')
            ->assertSeeText('first')
            ->assertSeeText('last')
            ->assertSeeText('Riki')
            ->assertSeeText('Hari');
    }

    public function testInputArray()
    {
        $this->post('/input/hello/array',
        ['products'=>[
                ["names"=>'Samsung Galaxy A7'],
                ["names"=>"Macbook Pro M2"],
                ["names"=>"Samsung notepad"]
            ]
        ])->assertSeeText('Samsung Galaxy A7')
        ->assertSeeText('Macbook Pro M2')
        ->assertSeeText('Samsung notepad');
    }

    public function testInputQuery()
    {
        $this->get('/input/hello/query?name=Riki')->assertSeeText('Hello Riki');
    }

    public function testInputType()
    {
        $this->post('/input/hello/type',[
            'name'=>'Riki',
            'married'=>'true',
            'birt_day'=>'1993-09-20'
        ])
            ->assertSeeText('Riki')
            ->assertSeeText('true')
            ->assertSeeText('1993-09-20');
    }

    public function testFilterOnly()
    {
        $this->post('/input/hello/filterOnly',[
            "name"=>[
                'first'=>'Asep',
                'middle'=>'Riki',
                'last'=>'Hari'
            ]
        ])
            ->assertSeeText('Asep')
            ->assertSeeText('Hari')
            ->assertDontSeeText('Riki');

    }

    public function testFilterExcept()
    {
        $this->post('/input/hello/filterExcept',[
           "username"=>'asepriki',
            'admin'=>true,
            'firstName'=>"Asep",
            'middleName'=>'Dadang',
            'lastname'=>'Riki'
        ])
            ->assertSeeText('Riki')
            ->assertSeeText('Dadang')
            ->assertSeeText('Dadang')
            ->assertDontSeeText('admin');
    }

    public function testFilterMerge()
    {
        $this->post('/input/hello/merge',[
            'username'=>'asepriki',
            'admin'=>true,
            'firstname'=>'Asep',
            'lastname'=>'Riki'
        ])
            ->assertSeeText('username')->assertSeeText('asepriki')
            ->assertSeeText('admin')
            ->assertSeeText('false')
            ->assertSeeText('Asep')
            ->assertSeeText('Riki');

    }


}
