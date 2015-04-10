<?php namespace Cubekit\Laraglide\Contracts;

interface FilesystemsProvider {

    /**
     * @return \League\Flysystem\FilesystemInterface;
     */
    public function getSourceFilesystem();

    /**
     * @return \League\Flysystem\FilesystemInterface;
     */
    public function getCacheFileSystem();

}