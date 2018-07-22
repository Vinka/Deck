<?php

namespace Vinka\Deck;

class Dealer implements DealerInterface
{
    /**
     * {@inheritdoc}
     */
    public function shuffleDeck(DeckInterface $deck)
    {
        $cards = $deck->getCards();
        shuffle($cards);
        return $deck->setCards($cards);
    }

    /**
     * {@inheritdoc}
     */
    public function dealCard(DeckInterface $deck, PlayerInterface $player)
    {
        $player->addCardsToHand($deck->getCard());
    }
}
