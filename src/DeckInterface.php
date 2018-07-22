<?php

namespace Vinka\Deck;

interface DeckInterface
{
    /**
     * @param CardInterface $card
     * @return mixed
     */
    public function addCard(CardInterface $card);

    /**
     * @return CardInterface
     * @throws \Exception
     */
    public function getCard();

    /**
     * @return array
     */
    public function getCards();

    /**
     * @param array $deck
     * @return $this
     */
    public function setCards($deck);
}
