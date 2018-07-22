<?php

namespace Vinka\Deck;

interface PlayerInterface
{
    /**
     * @param CardInterface $card
     * @return $this
     */
    public function addCardsToHand(CardInterface $card);

    /**
     * @return array
     */
    public function showCardsInHand();
}
