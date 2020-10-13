<?php

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

use Slim\Views\PhpRenderer;

use App\UserRepository;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        PhpRenderer::class => function (ContainerInterface $c) {
            $settings = $c->get('settings')['view'];

            return new PhpRenderer($settings['templatesDir']);
        },
        PDO::class => function (ContainerInterface $c) {
            $settings = $c->get('settings')['database'];

            $dns = sprintf('mysql:host=%s;dbname=%s;charset=%s',
                $settings['host'],
                $settings['dbname'],
                $settings['charset']
            );

            $conn = new PDO($dns, $settings['user'], $settings['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        },
        UserRepository::class => \DI\autowire(UserRepository::class)
    ]);
};
