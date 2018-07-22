<?php

namespace Vinka\Deck;

use PHPUnit\Framework\TestCase;

class DealerTest extends TestCase
{

    public function testDealCards()
    {
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $deck = $this->getMockForAbstractClass(DeckInterface::class);
        $player = $this->getMockForAbstractClass(PlayerInterface::class);
        $dealer = new Dealer();

        $deck->expects($this->once())
            ->method('getCard')
            ->willReturn($card);

        $player->expects($this->any())
            ->method('addCardsToHand');

        $dealer->dealCard($deck, $player);
    }

    public function shuffleDeck(){
        $deckFactory = new StandardDeckFactory();
        $deck = $deckFactory->create();
        $cards = $deck->getCards();
        $dealer = new Dealer();

        $this->assertNotSame($cards, $dealer->shuffleDeck($cards));
    }
}
