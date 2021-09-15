<?php

return [
    [
        'name' => 'Auto reload posts',
        'flag' => 'auto-reload-posts.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'auto-reload-posts.create',
        'parent_flag' => 'auto-reload-posts.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'auto-reload-posts.edit',
        'parent_flag' => 'auto-reload-posts.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'auto-reload-posts.destroy',
        'parent_flag' => 'auto-reload-posts.index',
    ],
];
