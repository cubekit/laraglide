<?php namespace Cubekit\Laraglide;

//use App, Config;
use League\Glide\ServerFactory as GliderServerFactory;

class ServerFactory extends GliderServerFactory {

    public function getServer()
    {
        $server = new Server(
            $this->getSource(),
            $this->getCache(),
            $this->getApi()
        );

        $server->setSourcePathPrefix($this->getSourcePathPrefix());
        $server->setCachePathPrefix($this->getCachePathPrefix());
        $server->setBaseUrl($this->getBaseUrl());

        return $server;
    }

    /**
     * Create server instance.
     * @param  array  $config Configuration parameters.
     * @return Server The configured server.
     */
    public static function create(array $config = [])
    {
        return (new static($config))->getServer();
    }

} 