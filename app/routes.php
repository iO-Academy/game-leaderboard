<?php
declare(strict_types=1);

use Slim\App;

return function (App $app) {

    $app->get('/scores', \App\Controllers\GetLeaderboardController::class);
    $app->post('/score', \App\Controllers\StoreScoreController::class);
    $app->get('/games', \App\Controllers\GetGamesController::class);

};
