<?php

namespace Vinka\Deck;

use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    /**
     * @var DeckInterface
     */
    private $deck;

    protected function setUp()
    {
        $this->deck = new Deck();
    }

    protected function tearDown()
    {
        $this->deck = null;
    }

    public function testAddCard()
    {
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $this->deck->addCard($card);
        $this->assertEquals($card, $this->deck->getCard());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Not enough cards to deal
     */
    public function testGetCardFromEmptyDeck()
    {
        $this->deck->getCard();
    }

    public function testSetCards()
    {
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $this->deck->setCards([$card]);
        $this->assertEquals([$card], $this->deck->getCards());
    }
}
