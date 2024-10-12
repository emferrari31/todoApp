<?php
namespace App\Models;
use PDO;
class TasksModel
{
    public function getTasks()
    {
        return [
            ['tasks' => 'Walk the cat'],
            ['tasks' => 'Cook Dinner for the cat'],
            ['tasks' => 'Type up notes with the cat']];
    }
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getAllTasks()
    {
        $query = $this->db->prepare("SELECT `id`, `tasks` FROM tasks WHERE `done` = 0");
        $query->execute();
        return $query->fetchAll();
    }
    public function getCompletedTasks()
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `done` = 1");
        $query->execute();
        return $query->fetchAll();
    }
    public function add($task)
    {
        $query = $this->db->prepare("INSERT INTO tasks (tasks) VALUES (:tasks)");
        $query->bindParam('tasks', $task);
        $query->execute();
    }
    public function markAsDone($id)
    {
        $query = $this->db->prepare('UPDATE `tasks` SET `done` = 1 WHERE `id` = :id');
        $query->execute(['id'=>$id]);
    }
    public function deleteTask($id)
    {
        $query = $this->db->prepare('DELETE FROM `tasks` WHERE `id` = :id');
        $query->execute(['id'=>$id]);
    }
}
