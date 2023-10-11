<?php

declare(strict_types=1);

namespace App\Factories;

class PdoFactory
{
    public function __invoke(): \PDO
    {
        $db = new \PDO('mysql:host=db;dbname=gameleaderboard', 'root', 'password');
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}