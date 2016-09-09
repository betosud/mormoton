<?php

namespace mormoton\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use mormoton\game;
use mormoton\user;

class ScorePolicy
{
    use HandlesAuthorization;

    public function showscore(game $game, $token){

        return $game->token === $token;
    }


}
