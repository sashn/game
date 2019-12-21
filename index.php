<?php

include 'vendor/autoload.php';

use Game\Game;

$game = new Game;

echo "the winner is" . $game->getWinner();