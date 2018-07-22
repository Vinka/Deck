<?php

namespace Vinka\Deck;

class StandardDeckFactory implements StandardDeckFactoryInterface
{
    /**
     * @var array
     */
    private $cards = array('Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King');

    /**
     * @var array
     */
    private $suits = array('Hearts', 'Clubs', 'Spades', 'Diamonds');

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $deck = new Deck();

        foreach ($this->suits as $suit) {
            foreach ($this->cards as $card) {
                $deck->addCard(new Card($suit, $card));
            }
        }

        return $deck;
    }
}
