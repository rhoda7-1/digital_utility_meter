<?php

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'database' => [
                'host' => 'sql201.epizy.com',
                'port' => 3306,
                'dbname' => 'epiz_26826331_Analog',
                'user' => 'epiz_26826331',
                'password' => 'T8dLYVLIn2',
                'charset' => 'utf8mb4'
            ],
            'view' => [
                'templatesDir' => __DIR__ . '/../templates'
            ]
        ],
    ]);
};
