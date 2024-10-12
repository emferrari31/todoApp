<?php
namespace App\Factories;
use PDO;

class PDOFactory
{
    public function __invoke(): PDO
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        return new PDO('mysql:host=db; dbname=todo', 'root', 'password', $options);
    }
}


namespace App\Factories;
