<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class EditTaskController
{
    private TasksModel $model;
    private PhpRenderer $renderer;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        $message = $request->getParsedBody()['message'] ?? '';
        $data = $this->model->updateTask($args['id'], $message);

        return $this->renderer->render($response, 'edit.phtml', ['tasks' => $data['tasks'], 'id' => $data['id']]);
    }

}