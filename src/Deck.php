<?php

namespace Vinka\Deck;

class Deck implements DeckInterface
{
    /**
     * @var array
     */
    private $deck = [];

    /**
     * {@inheritdoc}
     */
    public function getCard()
    {
        if (count($this->deck) < 1) {
            throw new \Exception('Not enough cards to deal');
        }
        return array_pop($this->deck);
    }

    /**
     * {@inheritdoc}
     */
    public function addCard(CardInterface $card)
    {
        $this->deck[] = $card;
    }

    /**
     * {@inheritdoc}
     */
    public function getCards()
    {
        return $this->deck;
    }

    /**
     * {@inheritdoc}
     */
    public function setCards($deck)
    {
        $this->deck = $deck;
        return $this;
    }
}
