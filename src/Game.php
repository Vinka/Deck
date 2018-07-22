<?php

namespace Vinka\Deck;

class Game implements GameInterface
{
    /**
     * @var int
     */
    private $numberOfCards;

    /**
     * @var DeckInterface
     */
    private $deck;

    /**
     * @var PlayerInterface
     */
    private $players;

    /**
     * @var DealerInterface
     */
    private $dealer;

    /**
     * @param array $players
     * @param int $numberOfCards
     * @param StandardDeckFactoryInterface $deckFactory
     * @param DealerInterface $dealer
     */
    public function __construct(
        array $players,
        int $numberOfCards,
        StandardDeckFactoryInterface $deckFactory,
        DealerInterface $dealer
    ) {
        if (count($players) < 1) {
            throw new \InvalidArgumentException('We need players to start');
        }
        $this->players = $players;
        if ($numberOfCards < 1) {
            throw new \InvalidArgumentException('Number of rounds needs to be higher than 0');
        }
        $this->numberOfCards = $numberOfCards;
        $this->deck = $deckFactory->create();
        if (count($this->players) * $this->numberOfCards > count($this->deck->getCards())) {
            throw new \InvalidArgumentException('We don\'t have enough cards');
        }
        $this->dealer = $dealer;
    }

    private function shuffleCards()
    {
        $this->deck = $this->dealer->shuffleDeck($this->deck);
    }

    private function dealCards()
    {
        $numberOfRounds = 0;
        $numberOfPlayers = count($this->players);
        while ($numberOfRounds < $this->numberOfCards) {
            for ($i = 0; $i < $numberOfPlayers; $i++) {
                $this->dealer->dealCard($this->deck, $this->players[$i]);
            }
            $numberOfRounds++;
        }
    }

    public function run()
    {
        $this->shuffleCards();
        $this->dealCards();
    }
}
