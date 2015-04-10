<?php namespace Cubekit\Laraglide;

use League\Glide\Server as GlideServer;

class Server extends GlideServer {

    /**
     * Get the cache path.
     * @param  mixed
     * @return string The cache path.
     */
    public function getCachePath()
    {

        $request = $this->resolveRequestObject(func_get_args());

        $requestPrefix = $this->makeRequestPrefix($request);

        $path = parent::getCachePath($request);

        if ($this->cachePathPrefix) {
            return str_replace(
                $this->cachePathPrefix,
                $this->cachePathPrefix .'/'. $requestPrefix,
                $path
            );
        }

        return "{$requestPrefix}/{$path}";
    }

    private function makeRequestPrefix($request)
    {
        $w = $request->query->get('w');
        $h = $request->query->get('h');
        $fit = $request->query->get('fit');

        return "{$w}x{$h}-{$fit}";
    }

}