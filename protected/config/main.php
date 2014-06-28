<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    'language' => 'ru',
    'sourceLanguage' => 'en',
    'charset' => 'utf-8',

    'preload' => ['log'],

    /*
    'controllerMap' => [
        'min' => [
            'class' => 'ext.minScript.controllers.ExtMinScriptController',
        ],
    ],
    */

    'import' => [
        'application.models.*',
        'application.components.*',
    ],

    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => '1111',
            'ipFilters' => ['127.0.0.1', $_SERVER['REMOTE_ADDR']],
        ],
    ],

    'components' => [
        'redis' => [
            'class' => 'application.components.YiiRedis.ARedisConnection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 1,
            'prefix' => 'yii.redis.'
        ],
        'user' => [
            'allowAutoLogin' => true,
        ],
        'cache' => [
            'class' => 'application.components.YiiRedis.ARedisCache'
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => true,
            'rules' => [
                'gii' => 'gii',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'request' => [
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
        ],

        'db' => [
            'connectionString' => 'mysql:host=localhost;dbname=testdrive',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
            'schemaCachingDuration' => YII_DEBUG ? 0 : 2592000,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'session' => [
            'class' => 'CCacheHttpSession',
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CProfileLogRoute',
                    'enabled' => YII_DEBUG,
                    'report' => 'summary',
                ],
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
                [
                    'class' => 'CWebLogRoute',
                ],
            ],
        ],
        /*
        'clientScript' => [
            'class' => 'ext.minScript.components.ExtMinScript',
        ],
        */
    ],

    // using Yii::app()->params['paramName']
    'params' => [
        'adminEmail' => 'webmaster@example.com',
    ],
    'timeZone' => 'Europe/Moscow',
];
