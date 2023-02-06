<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileUploadControllerTest extends TestCase
{
    public function testUpload()
    {
        $image = UploadedFile::fake()->image('joko.png');
        $this->post('/file/upload',[
            'picture'=>$image
        ])->assertSeeText('joko.png');

    }

}
