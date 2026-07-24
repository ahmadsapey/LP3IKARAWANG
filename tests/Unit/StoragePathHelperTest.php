<?php

namespace Tests\Unit;

use App\Helpers\StoragePathHelper;
use Tests\TestCase;

class StoragePathHelperTest extends TestCase
{
    public function test_it_builds_public_storage_urls_for_disk_paths(): void
    {
        $this->assertSame('/storage/image/logo.png', StoragePathHelper::url('image/logo.png'));
        $this->assertSame('/storage/ktp/123.png', StoragePathHelper::url('ktp/123.png'));
    }

    public function test_it_keeps_remote_urls_unchanged(): void
    {
        $url = 'https://example.com/image.png';

        $this->assertSame($url, StoragePathHelper::url($url));
    }
}
