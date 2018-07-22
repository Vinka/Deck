<?php

namespace Vinka\Deck;

interface DealerInterface
{
    /**
     * @param DeckInterface $deck
     * @return DeckInterface
     */
    public function shuffleDeck(DeckInterface $deck);

    /**
     * @param DeckInterface $deck
     * @param PlayerInterface $player
     * @throws \Exception
     */
    public function dealCard(DeckInterface $deck, PlayerInterface $player);
}
