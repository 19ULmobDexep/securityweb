<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;

use App\Application\Actions\User\ListJobDatingAction;
use App\Application\Actions\User\ViewJobDatingAction;
use App\Application\Actions\User\UpdateJobDatingAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/jobdatings', function (Group $group) {

        $group->get('', ListJobDatingAction::class);
        $group->post('',ListJobDatingAction::class);
        $group->get('/{id}',ViewJobDatingAction::class);
        $group->put('/{id}',UpdateJobDatingAction::class);
        $group->delete('/{id}',ListJobDatingAction::class);

        $group->post('/{id}/{listName}/{listId}', ListJobDatingAction::class);

        $group->get('/{id}/{listName}/{listId}', ViewJobDatingAction::class);
        $group->put('/{id}/{listName}/{listId}', UpdateJobDatingAction::class);
        $group->delete('/{id}/{listName}/{listId}', ListJobDatingAction::class);

    });


    $app->group('/users', function (Group $group) {

        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });
};
