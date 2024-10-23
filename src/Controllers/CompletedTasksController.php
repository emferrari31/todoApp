<?php

namespace App\Controllers;
use App\Models\AddTaskModel;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class CompletedTasksController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }
    public function __invoke($request, $response)
    {
        $data = $this->model->getCompletedTasks();
        return $this->renderer->render($response, 'completed.phtml', ['results'=>$data]);
    }
}