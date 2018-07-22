<?php

namespace Vinka\Deck;

use PHPUnit\Framework\TestCase;

class StandardDeckFactoryTest extends TestCase
{

    public function testCreate()
    {
        $deckFactory = new StandardDeckFactory();
        $deck = $deckFactory->create();
        $this->assertInstanceOf(DeckInterface::class, $deck);
    }
}
