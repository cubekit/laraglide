<?php namespace Cubekit\Laraglide;

use Storage;
use Cubekit\Laraglide\Contracts\FilesystemsProvider;

class DisksProvider implements FilesystemsProvider {

    public function getSourceFilesystem()
    {
        return Storage::disk( config('cubekit.laraglide.disks.source') )->getDriver();
    }

    public function getCacheFileSystem()
    {
        return Storage::disk( config('cubekit.laraglide.disks.cache') )->getDriver();
    }

}