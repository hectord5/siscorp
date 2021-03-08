<?php

return [

    'consume' => [

        'alfred' => [
            'url' => 'web',
            'token' => env('API_ALFRED_TOKEN')
        ],

        'sicove' => [
            'url' => '128.222.200.20/sicove',
            'username' => 'pruebas',
            'password' => 'pruebas1',
        ],

        'licenciaCurp' => [
            'url' => 'http://128.222.200.25:9015/apiSISCORP/api/',
            'username' => 'semovi',
            'password' => 's3m0v1s1c0v3',
        ],
        'licenciaCandados' => [
            'url' => 'http://128.222.200.25:8084/consultaLicencias.asmx?',
        ],
        'candados'=>[
            'url'=>'http://128.222.200.178:',
            'opcion'=>[
                'tipocandados'=>'8504/tipocandados',
                'buscacandados'=>'8503/buscacandados',
                'insertacandado'=>'8500/insertacandado',
                'insertacandadocarga'=>'8520/insertacandadocarga',
                'insertacandadomicro'=>'8510/insertacandadomicro',
                'cancelacandados'=>'8502/cancelacandados',
                'listaestatus'=>'8550/listaestatus',
                'cambiaestatus'=>'8551/cambiaestatus'
            ]
        ],
        'candadosTaxi'=>[
            'url'=>'http://128.222.200.32:9006/api/taxi/auxiliar/',
            'opcion'=>[
                'candados'=>'candados',
                'insert'=>'insert/candado',
                'update'=>'update/candado'
            ]
        ]

    ],

];
