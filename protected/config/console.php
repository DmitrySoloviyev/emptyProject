<?php

return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',

    'preload' => ['log'],

    'components' => [
        'db' => [
            'connectionString' => 'mysql:host=localhost;dbname=testdrive',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'schemaCachingDuration' => 0,
        ],

        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],
    ],
    'commandMap' => [
        'migrate' => [
            'class' => 'system.cli.commands.MigrateCommand',
            'interactive' => false,
        ],
    ],
    'timeZone' => 'Europe/Moscow',
];
