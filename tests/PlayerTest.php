<?php

namespace Vinka\Deck;

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testAddCardsToHand()
    {
        $player = new Player();
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $player->addCardsToHand($card);
        $this->assertEquals([$card], $player->showCardsInHand());
    }
}
