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

    $rootUrl = str_finish( config('laraglide.rootUrl'), '/' );

    $path = $server->getCachePath($request);

    return "{$rootUrl}{$path}";
}