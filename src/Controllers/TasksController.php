<?php

namespace App\Controllers;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class TasksController
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
        $tasks = $this->model->getAllTasks();
        return $this->renderer->render($response, "tasks.phtml", ['tasks' => $tasks]);
    }
}
