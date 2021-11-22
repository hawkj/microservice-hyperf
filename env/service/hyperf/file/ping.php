<?php
$http = new Swoole\Http\Server('0.0.0.0', 9501);
$http->set([
    'worker_num' => 1
]);
$http->on('start', function ($server) {
});

$http->on('request', function ($request, $response) {
    $response->end('pong');
});

$http->start();
