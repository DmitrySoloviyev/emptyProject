<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'),
    [
        'components' => [
            'fixture' => [
                'class' => 'system.test.CDbFixtureManager',
            ],
            'db' => [
                'class' => 'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=testdrive',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ],
        ],
    ]
);
