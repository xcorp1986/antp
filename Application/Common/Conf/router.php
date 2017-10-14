<?php
return [
    'URL_ROUTE_RULES' => [
        ['api/users/upload', 'Admin/User/upload', '', ['method' => 'post']],
        ['api/users/:id', 'Admin/User/user_get', '', ['method' => 'get']],
        //注意：列表记录对应的路由必须要放在单条记录路由的后面，否则无法获取单条记录
        ['api/users', 'Admin/User/user_get', '', ['method' => 'get']],
        ['api/users', 'Admin/User/user_post', '', ['method' => 'post']],
        ['api/users/:id', 'Admin/User/user_put', '', ['method' => 'put']],
        ['api/users/:id', 'Admin/User/user_delete', '', ['method' => 'delete']],
    ],
];