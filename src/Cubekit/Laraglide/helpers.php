<?php

function thumbnail($image, $params = null)
{
    if (is_string($params))
    {
        list($w, $h, $fit) = explode('x', $params);

        $params = compact('w', 'h', 'fit');
    }

    $server = app('laraglide');

    $request = $server->makeImage($image, $params);

    $url = $server->getCachePath($request);

    $rootUrl = config('cubekit.laraglide.rootUrl') ?: '/';
    $rootUrl = str_finish($rootUrl, '/');

    return "{$rootUrl}{$url}";
}