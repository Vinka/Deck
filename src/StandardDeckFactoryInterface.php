<?php

namespace Vinka\Deck;

interface StandardDeckFactoryInterface
{
    /**
     * @return DeckInterface
     */
    public function create();
}
