<?php

namespace App\Controllers;

use App\Models\LeadboardModel;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Interfaces\ResponseInterface;

class GetLeaderboardController
{

    private LeadboardModel $model;

    public function __construct(LeadboardModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        try {
            $game = $request->getQueryParam('game');
            if (is_string($game) && !empty($game)) {
                $leaderboard = $this->model->getLeaderboard($game);
                if (!empty($leaderboard)) {
                    return $response->withJson(['success' => true, 'data' => $leaderboard, 'message' => 'Data found']);
                } else {
                    return $response->withJson(['success' => false, 'data' => [], 'message' => 'No data found for game: ' . $game], 400);
                }
            } else {
                return $response->withJson(['success' => false, 'data' => [], 'message' => 'Invalid request data'], 400);
            }
        } catch(\Exception $e) {
            return $response->withJson(['success' => false, 'data' => [], 'message' => 'Unexpected Error Occurred'], 500);
        }
    }

}