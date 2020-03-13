<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Domain\User\JobDatingRepository;
use App\Infrastructure\Persistence\User\InMemoryJobDatingRepository;
use DI\ContainerBuilder;


return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        JobDatingRepository::class => \DI\autowire(InMemoryJobDatingRepository::class),
    ]);

};
