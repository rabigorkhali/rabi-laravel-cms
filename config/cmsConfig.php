<?php

$getMethod = 'get';
$postMethod = 'post';
$putMethod = 'put';
$deleteMethod = 'delete';

$homeBaseUrl = '/home';
$userBaseUrl = '/users';
$roleBaseUrl = '/roles';
$configBaseUrl = '/configs';
$pageBaseUrl = '/pages';
$postCategoryUrl = '/post-categories';
$postUrl = '/posts';
$sliderUrl = '/sliders';

return [
    // routes entered in this array are accessible by any user no matter what role is given
    'permissionGrantedbyDefaultRoutes' => [
        [
            'url' => $homeBaseUrl,
            'method' => $getMethod,
        ],
        [
            'url' => '/logout',
            'method' => $getMethod,
        ],
        [
            'url' => '/dashboard',
            'method' => $getMethod,
        ],
        [
            'url' => '/profile',
            'method' => $getMethod,
        ],
        [
            'url' => '/profile/*',
            'method' => $putMethod,
        ],
        [
            'url' => '/change-password',
            'method' => $getMethod,
        ],
        [
            'url' => '/change-password',
            'method' => $putMethod,
        ],

    ],

    // All the routes are accessible by super user by default
    // routes entered in this array are not accessible by super user
    'permissionDeniedToSuperUserRoutes' => [],

    'modules' => [
        [
            'name' => 'Dashboard',
            'icon' => "<i class='fa fa-home'></i>",
            'hasSubmodules' => false,
            'route' => $homeBaseUrl,
            'routeIndexName' => 'home.index',
            'routeName' => 'home',
            'permissions' => [
                [
                    'name' => 'View Dashboard',
                    'route' => [
                        'url' => $homeBaseUrl,
                        'method' => $getMethod,
                    ],
                ]
            ],
        ],
        [
            'name' => 'User Management',
            'icon' => "<i class='fa fa-user'></i>",
            'hasSubmodules' => true,
            'routeIndexNameMultipleSubMenu' => ['users.index', 'roles.index'], //use for opening sidenav menu only
            'submodules' => [
                [
                    'name' => 'Users',
                    'icon' => "<i class='fa fa-users'></i>",
                    'hasSubmodules' => false,
                    'route' => $userBaseUrl,
                    'routeIndexName' => 'users.index',
                    'routeName' => 'users',
                    'permissions' => [
                        [
                            'name' => 'View Users',
                            'route' => [
                                'url' => $userBaseUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Users',
                            'route' => [
                                [
                                    'url' => $userBaseUrl . '/create',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $userBaseUrl,
                                    'method' => $postMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Edit Users',
                            'route' => [
                                [
                                    'url' => $userBaseUrl . '/*/edit',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $userBaseUrl . '/*',
                                    'method' => $putMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Delete Users',
                            'route' => [
                                'url' => $userBaseUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ]
                    ],
                ],
                [
                    'name' => 'Roles',
                    'icon' => "<i class='fa fa-tags'></i>",
                    'hasSubmodules' => false,
                    'route' => $roleBaseUrl,
                    'routeIndexName' => 'roles.index',
                    'routeName' => 'roles',
                    'permissions' => [
                        [
                            'name' => 'View Roles',
                            'route' => [
                                'url' => $roleBaseUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Roles',
                            'route' => [
                                [
                                    'url' => $roleBaseUrl . '/create',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $roleBaseUrl,
                                    'method' => $postMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Edit Roles',
                            'route' => [
                                [
                                    'url' => $roleBaseUrl . '/*/edit',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $roleBaseUrl . '/*',
                                    'method' => $putMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Delete Roles',
                            'route' => [
                                'url' => $roleBaseUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => 'Settings',
            'icon' => "<i class='fa fa-cogs' aria-hidden='true'></i>",
            'hasSubmodules' => true,
            'routeIndexNameMultipleSubMenu' => ['configs.index'],
            'submodules' => [
                [
                    'name' => 'Configs',
                    'icon' => '<i class="fa fa-cog" aria-hidden="true"></i>',
                    'route' => $configBaseUrl,
                    'routeIndexName' => 'configs.index',
                    'routeName' => 'configs',
                    'hasSubmodules' => false,
                    'permissions' => [
                        [
                            'name' => 'View Configs',
                            'route' => [
                                'url' => $configBaseUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Config',
                            'route' => [
                                'url' => $configBaseUrl,
                                'method' => $postMethod,
                            ],
                        ],
                        [
                            'name' => 'Edit Config',
                            'route' => [
                                'url' => $configBaseUrl . '/*',
                                'method' => $putMethod,
                            ],
                        ],
                        [
                            'name' => 'Delete Config',
                            'route' => [
                                'url' => $configBaseUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => 'Post',
            'icon' => "<i class='fa fa-file-clipboard' aria-hidden='true'></i>",
            'hasSubmodules' => true,
            'routeIndexNameMultipleSubMenu' => ['post-categories.index','posts.index'],
            'submodules' => [
                [
                    'name' => 'Category',
                    'icon' => '<i class="fa fa-cog" aria-hidden="true"></i>',
                    'route' => $postCategoryUrl,
                    'routeIndexName' => 'post-categories.index',
                    'routeName' => 'post-categories',
                    'hasSubmodules' => false,
                    'permissions' => [
                        [
                            'name' => 'View Category',
                            'route' => [
                                'url' => $postCategoryUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Category',
                            'route' => [
                                'url' => $postCategoryUrl,
                                'method' => $postMethod,
                            ],
                        ],
                        [
                            'name' => 'Edit Category',
                            'route' => [
                                'url' => $postCategoryUrl . '/*',
                                'method' => $putMethod,
                            ],
                        ],
                        [
                            'name' => 'Delete Category',
                            'route' => [
                                'url' => $postCategoryUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                    ],
                ],
                [
                    'name' => 'Post',
                    'icon' => '<i class="fa fa-cog" aria-hidden="true"></i>',
                    'route' => $configBaseUrl,
                    'routeIndexName' => 'posts.index',
                    'routeName' => 'posts',
                    'hasSubmodules' => false,
                    'permissions' => [
                        [
                            'name' => 'View Post',
                            'route' => [
                                'url' => $postUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Post',
                            'route' => [
                                'url' => $postUrl,
                                'method' => $postMethod,
                            ],
                        ],
                        [
                            'name' => 'Edit Post',
                            'route' => [
                                'url' => $postUrl . '/*',
                                'method' => $putMethod,
                            ],
                        ],
                        [
                            'name' => 'Delete Post',
                            'route' => [
                                'url' => $postUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                    ],
                ],

            ],
        ],
        [
            'name' => 'Pages',
            'icon' => "<i class='fa fa-file'></i>",
            'hasSubmodules' => false,
            'route' => $pageBaseUrl,
            'routeIndexName' => 'pages.index',
            'routeName' => 'pages',
            'permissions' => [
                [
                    'name' => 'View Page',
                    'route' => [
                        'url' => $pageBaseUrl,
                        'method' => $getMethod,
                    ],
                ],
                [
                    'name' => 'Create Page',
                    'route' => [
                        [
                            'url' => $pageBaseUrl . '/create',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $pageBaseUrl,
                            'method' => $postMethod,
                        ],
                    ],
                ],
                [
                    'name' => 'Edit Page',
                    'route' => [
                        [
                            'url' => $pageBaseUrl . '/*/edit',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $pageBaseUrl . '/*',
                            'method' => $putMethod,
                        ],
                    ],
                ],
                [
                    'name' => 'Delete Page',
                    'route' => [
                        'url' => $pageBaseUrl . '/*',
                        'method' => $deleteMethod,
                    ],
                ]
            ],

        ],
        [
            'name' => 'Sliders',
            'icon' => "<i class='fa fa-sliders'></i>",
            'hasSubmodules' => false,
            'route' => $pageBaseUrl,
            'routeIndexName' => 'sliders.index',
            'routeName' => 'sliders',
            'permissions' => [
                [
                    'name' => 'View Slider',
                    'route' => [
                        'url' => $sliderUrl,
                        'method' => $getMethod,
                    ],
                ],
                [
                    'name' => 'Create Slider',
                    'route' => [
                        [
                            'url' => $sliderUrl . '/create',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $sliderUrl,
                            'method' => $postMethod,
                        ],
                    ],
                ],
                [
                    'name' => 'Edit Slider',
                    'route' => [
                        [
                            'url' => $sliderUrl . '/*/edit',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $sliderUrl . '/*',
                            'method' => $putMethod,
                        ],
                    ],
                ],
                [
                    'name' => 'Delete Slider',
                    'route' => [
                        'url' => $sliderUrl . '/*',
                        'method' => $deleteMethod,
                    ],
                ]
            ],

        ],
    ],
];
