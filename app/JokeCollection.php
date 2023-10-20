<?php

namespace app;

class JokeCollection
{
    /**
     * @var Joke[]
     */
    private array $jokes;

    public function __construct(array $jokes = [])
    {

        $this->jokes = $jokes;
    }

    public function add(Joke $joke): void
    {
        $this->jokes[$joke->getId()] = $joke;
    }

    public function list(): array
    {
        return $this->jokes;
    }
}