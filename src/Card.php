<?php

namespace Vinka\Deck;

class Card implements CardInterface
{
    /**
     * @var string
     */
    private $suit;

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $suit
     * @param string $value
     */
    public function __construct(string $suit, string $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getSuitAndValue(){
        return $this->suit . $this->value;
    }

}
