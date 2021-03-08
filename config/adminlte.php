<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'SISCORP',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<span style="color: white;font-weight: bold; ">SISCORP</span>',
    'logo_img' => 'images/logo-movi.png',
    'logo_login' => '<span style="font-weight: bold; color: black">SISCORP</span>',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'SISCORP',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => 'bg-primary',
    'usermenu_header_class' => false,
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-dark',
    'classes_auth_btn' => 'btn-flat btn-outline-success',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => 'bg-success',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-success   elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => '',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => false,
        ],
        ['header' => 'Secciones'],
        [
            'text'    => 'Administrador',
            'url' => '#',
            'icon'    => 'fas fa-user-cog',
            'icon_color'    => 'gray-dark',
            'classes' =>'bg-light',
            'can'=>['sistemas','admin'],
            'submenu' => [
                [
                    'text' => 'Administrar usuarios',
                    'route'  => 'AdminUsers',
                    'icon' => 'fas fa-car-alt',
                    'icon_color'    => 'gray',
                ],
//                [
//                    'text' => 'Administrar usuarios beta',
//                    'route'  => 'AdminUsersBeta',
//                    'icon' => 'fas fa-car-alt',
//                    'icon_color'    => 'gray',
//                ],
            ],
        ],
        [
            'text'    => 'Sabanas',
            'icon'    => 'fas fa-file-alt',
            'icon_color'    => 'gray-dark',
            'can'=>['sistemas','admin','sabanas'],
            'url' => 'sabanas/controles',
        ],
        [
            'text'    => 'Historial de Movimientos',
            'icon'    => 'fas fa-book',
            'icon_color'    => 'gray-dark',
            'url' => 'historial/controles',
            'can'=>['sistemas','admin','historial'],

        ],
        [
            'text'    => 'Licencias',
            'icon'    => 'far fa-id-card',
            'icon_color'    => 'gray-dark',
            'can'=>['sistemas','admin','licencias'],
            'submenu' => [
                [
                    'text' => 'Por CURP',
                    'url' => 'licencias/busca/CURP',
                    'icon' => 'fas fa-clipboard',
                    'icon_color'    => 'gray',
                ],
                [
                    'text' => 'Por Folio',
                    'url' => 'licencias/busca/Folio',
                    'icon' => 'far fa-clipboard',
                    'icon_color'    => 'gray',
                ],

            ],

        ],
//        [
//            'text'    => 'Correcciones',
//            'icon'    => 'fas fa-times',
//            'icon_color'    => 'gray-dark',
//            'route' => 'ControlCorrecciones',
//            'can'=>['sistemas','admin','correcciones']
//        ],
        [
            'text'    => 'Reimpresión',
            'icon'    => 'fas fa-book-open',
            'icon_color'    => 'gray-dark',
            'url' => '#',
            'can'=>['sistemas','admin','correcciones'],
            'submenu' => [
                [
                    'text' => 'Acuse',
                    'route'  => 'seleccionacuse',
                    'icon' => 'fas fa-clipboard',
                    'icon_color'    => 'gray',
                ],
                [
                    'text' => 'Hoja valorada',
                    'route'  => 'seleccionvalorada',
                    'icon' => 'far fa-clipboard',
                    'icon_color'    => 'gray',
                ],

             ],

        ],
        [
            'text'    => 'Adeudos',
            'icon'    => 'fas fa-money-bill-alt',
            'icon_color'    => 'gray-dark',
            'route' => 'adeudos-buscar',
            'can'=>['sistemas','admin','adeudos'],

        ],
        [
            'text'    => 'Verificar Linea de Captura',
            'icon'    => 'fas fa-align-left',
            'icon_color'    => 'gray-dark',
            'url' =>'revisa/lc',
            'can'=>['sistemas','admin','verificarLinea']
        ],
        [
            'text'    => 'Actividad de Usuarios',
            'icon'    => 'fas fa-cogs',
            'icon_color'    => 'gray-dark',
            'url' =>'/actividad',
            'can'=>['sistemas','admin','director']
        ],
        [
            'text' => 'Solicitudes Masivas',
            'url' => '#',
            'icon' => 'far fa-clipboard',
            'icon_color'    => 'gray-dark',
            'submenu' => [
                [
                    'text' => 'Sabanas',
                    'url'  => 'sabanas/sabanas-masivas_1',
                    'icon' => 'fas fa-clipboard',
                    'icon_color'    => 'gray',
                ],
                [
                    'text' => 'Historial de movimiento',
                    'url'  => 'historial/historial-masivo_1',
                    'icon' => 'fas fa-clipboard',
                    'icon_color'    => 'gray',
                ],

            ],
            'can'=>['sistemas'],
        ],
        [
            'text'    => 'Candados',
            'icon'    => 'fas fa-lock',
            'icon_color'    => 'gray-dark',
            'submenu' => [
                [
                    'text' => 'Sobre vehiculos',
                    'icon' => 'fas fa-car',
                    'icon_color'    => 'gray',
                    'url'  => 'candados/controles',

                ],
                [
                    'text'    => 'Sobre Licencias',
                    'icon'    => 'fas fa-credit-card',
                    'icon_color'    => 'gray-dark',
                    'route' =>'candados.licencias.index',
                    'can'=>['sistemas','admin','licencias']
                ],


            ],
            'can'=>['sistemas','admin','candados']
        ],
//        [
//            'text' => 'Aviso de Venta',
//            'route' => 'busca_aviso',
//            'icon' => 'fas fa-hand-holding-usd',
//            'icon_color'    => 'gray-dark',
//            'can'=>['sistemas','admin'],
//
//        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'Jquery' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js',
                ],
            ],
        ],
    ],
];
