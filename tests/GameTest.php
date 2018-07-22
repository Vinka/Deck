<?php

namespace Vinka\Deck;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testRun()
    {
        $player = $this->getMockForAbstractClass(PlayerInterface::class);
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $numberOfRounds = 1;
        $deckFactory = $this->getMockForAbstractClass(StandardDeckFactoryInterface::class);
        $dealer = $this->getMockForAbstractClass(DealerInterface::class);
        $deck = $this->getMockForAbstractClass(DeckInterface::class);

        $deckFactory->expects($this->once())
            ->method('create')
            ->willReturn($deck);

        $deck->expects($this->any())
            ->method('getCards')
            ->willReturn([$card]);

        $dealer->expects($this->once())
            ->method('shuffleDeck')
            ->willReturn($deck);

        $dealer->expects($this->once())
            ->method('dealCard');

        $game = new Game(
            [$player],
            $numberOfRounds,
            $deckFactory,
            $dealer
        );

        $game->run();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage We need players to start
     */
    public function testGameWithEmptyPlayersArray()
    {
        $numberOfRounds = 1;
        $deckFactory = $this->getMockForAbstractClass(StandardDeckFactoryInterface::class);
        $dealer = $this->getMockForAbstractClass(DealerInterface::class);

        $game = new Game(
            [],
            $numberOfRounds,
            $deckFactory,
            $dealer
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Number of rounds needs to be higher than 0
     */
    public function testGameWithZeroRounds()
    {
        $player = $this->getMockForAbstractClass(PlayerInterface::class);
        $deckFactory = $this->getMockForAbstractClass(StandardDeckFactoryInterface::class);
        $dealer = $this->getMockForAbstractClass(DealerInterface::class);

        $game = new Game(
            [$player],
            0,
            $deckFactory,
            $dealer
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage We don't have enough cards
     */
    public function testCardOutOfDeck()
    {
        $numberOfRounds = 2;
        $player = $this->getMockForAbstractClass(PlayerInterface::class);
        $deckFactory = $this->getMockForAbstractClass(StandardDeckFactoryInterface::class);
        $dealer = $this->getMockForAbstractClass(DealerInterface::class);
        $card = $this->getMockForAbstractClass(CardInterface::class);
        $deck = $this->getMockForAbstractClass(DeckInterface::class);

        $deckFactory->expects($this->once())
            ->method('create')
            ->willReturn($deck);

        $deck->expects($this->any())
            ->method('getCards')
            ->willReturn([$card]);

        $game = new Game(
            [$player],
            $numberOfRounds,
            $deckFactory,
            $dealer
        );
    }

}
