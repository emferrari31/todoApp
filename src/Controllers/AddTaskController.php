<?php

namespace App\Controllers;
use App\Models\AddTaskModel;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class AddTaskController
{
    private TasksModel $model;
    private PhpRenderer $renderer;
    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->model = $model;
    }
    public function __invoke($request, $response)
    {
        $task = $request->getParsedBody();
        $this->model->add($task['taskLabel']);
        //This returns the home page / instead of directing us to the add page.
        return $response->withHeader('Location', '/')->withStatus(301);
    }
}