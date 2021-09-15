<?php

return [
    [
        'name' => 'Rsses',
        'flag' => 'rss.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'rss.create',
        'parent_flag' => 'rss.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'rss.edit',
        'parent_flag' => 'rss.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'rss.destroy',
        'parent_flag' => 'rss.index',
    ],
];
