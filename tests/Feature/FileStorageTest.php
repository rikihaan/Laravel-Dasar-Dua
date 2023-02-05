<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {

        $filesystem = Storage::disk('local');
        $filesystem->put('file.text','Put Your Content Here');
        $content = $filesystem->get('file.text');
        self::assertEquals('Put Your Content Here',$content);
        $filesystem->append('file.text','Asep Riki');
    }

    public function testStorageLink()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('testLink.txt','it is content from public storage to public storage');
        $filesystem->put('testLink2.txt','it is content from public storage to public storage');

        self::assertEquals('it is content from public storage to public storage',$filesystem->get('testLink.txt'));

    }


}
