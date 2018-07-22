<?php

include __DIR__ .'/../vendor/autoload.php';

use Vinka\Deck\Dealer;
use Vinka\Deck\Game;
use Vinka\Deck\Player;
use Vinka\Deck\StandardDeckFactory;

$players = [];
$numberOfPlayers = 4;
$numbersOfCards = 7;

for ($i = 0; $i < $numberOfPlayers; $i++) {
    $players[] = new Player();
}

$game = new Game($players, $numbersOfCards, new StandardDeckFactory(), new Dealer());
$game->run();

