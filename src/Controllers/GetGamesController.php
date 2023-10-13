<?php

namespace App\Controllers;

use App\Models\LeadboardModel;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Interfaces\ResponseInterface;

class GetGamesController
{

    private LeadboardModel $model;

    public function __construct(LeadboardModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        try {
                $games = $this->model->getAllGames();
                if (!empty($games)) {
                    return $response->withJson(['success' => true, 'data' => ['games' => $games], 'message' => 'Data found']);
                } else {
                    return $response->withJson(['success' => false, 'data' => [], 'message' => 'No games found']);
                }
        } catch(\Exception $e) {
            return $response->withJson(['success' => false, 'data' => [], 'message' => 'Unexpected Error Occurred'], 500);
        }
    }

}