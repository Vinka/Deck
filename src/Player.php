<?php

namespace Vinka\Deck;

class Player implements PlayerInterface
{
    /**
     * @var array
     */
    private $cardsInHand = [];

    /**
     * {@inheritdoc}
     */
    public function addCardsToHand(CardInterface $card)
    {
        $this->cardsInHand[] = $card;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function showCardsInHand()
    {
        return $this->cardsInHand;
    }
}
