<?php
declare(strict_types=1);
use App\Controllers\CompletedTasksController;
use App\Controllers\EditTaskController;
use App\Controllers\MarkTaskDoneController;
use App\Controllers\CoursesAPIController;
use App\Controllers\UpdateTaskController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use \App\Controllers\TasksController;
use \App\Controllers\AddTaskController;
use \App\Controllers\DeleteTaskController;


return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', TasksController::class);
    $app->post('/add', AddTaskController::class);
    $app->post('/markDone/{id}', MarkTaskDoneController::class);
    $app->get('/completed', CompletedTasksController::class);
    $app->post('/delete/{id}', DeleteTaskController::class);
    $app->get('/edit/{id}', EditTaskController::class);
    $app->post('/update/', UpdateTaskController::class);


};
