<?php

namespace App\Controllers;

use App\Models\LeadboardModel;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Interfaces\ResponseInterface;

class StoreScoreController
{
    private LeadboardModel $model;

    public function __construct(LeadboardModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        try {
            $score = $request->getParsedBody();
            if (
                is_array($score) &&
                !empty($score['game']) &&
                !empty($score['name']) &&
                !empty($score['score'])
            ) {
                $result = $this->model->storeScore($score);
                if ($result) {
                    return $response->withJson(['success' => true, 'message' => 'Score stored'], 201);
                } else {
                    return $response->withJson(['success' => false, 'message' => 'Unable to store score'], 500);
                }
            } else {
                return $response->withJson(['success' => false, 'message' => 'Invalid post data'], 400);
            }
        } catch(\Exception $e) {
            return $response->withJson(['success' => false, 'message' => 'Unexpected Error Occurred'], 500);
        }
    }
}