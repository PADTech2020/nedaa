<?php

return [
    [
        'name' => 'Subscribes',
        'flag' => 'subscribe.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'subscribe.create',
        'parent_flag' => 'subscribe.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'subscribe.edit',
        'parent_flag' => 'subscribe.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'subscribe.destroy',
        'parent_flag' => 'subscribe.index',
    ],
];
