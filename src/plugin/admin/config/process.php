<?php

return [
    'task'  => [
        'handler'  => plugin\admin\process\Task::class
    ],
    'websocket'  => [
        'handler'  => plugin\admin\process\WebSocket::class,
        'listen'  => 'websocket://0.0.0.0:9527',
        'count'   => 1,
    ],
];
