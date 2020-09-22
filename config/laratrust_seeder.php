<?php

return [
    'role_structure' => [
        
        'super_admin' => [
            'admins' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'design_departments' => 'c,r,u,d',
            'design_ideas' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
        ],
        
        'admin' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
