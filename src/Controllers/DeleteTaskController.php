<?php

namespace App\Controllers;

use App\Models\TasksModel;

class DeleteTaskController
{
    private TasksModel $model;

    public function __construct(TasksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke($request, $response, $args)
    {
        $this->model->deleteTask($args['id']);

        return $response->withHeader('Location', '/completed')->withStatus(301);
    }

}