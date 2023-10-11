<?php

namespace App\Models;

class LeadboardModel
{
    private \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getLeaderboard(string $leaderboardName): array
    {
        $query = $this->db->prepare('SELECT * FROM `leaderboard` WHERE `game` = ? ORDER BY `score` DESC');
        $query->execute([$leaderboardName]);
        return $query->fetchAll();
    }

    public function storeScore(array $score): bool
    {
        $query = $this->db->prepare('INSERT INTO `leaderboard` (`game`, `name`, `score`) VALUES (:game, :name, :score)');
        return $query->execute($score);
    }

}