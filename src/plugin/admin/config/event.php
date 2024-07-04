<?php

return [
    'user.login' => [
        [plugin\admin\app\event\SystemUser::class, 'login'],
    ],
    'user.operateLog' => [
        [plugin\admin\app\event\SystemUser::class, 'operateLog'],
    ]
];