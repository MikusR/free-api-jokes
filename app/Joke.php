<?php

namespace app;

class Joke

{
    private string $type;
    private string $setup;
    private string $punchline;
    private int $id;

    public function __construct(string $type, string $setup, string $punchline, int $id)
    {
        $this->type = $type;
        $this->setup = $setup;
        $this->punchline = $punchline;
        $this->id = $id;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function getSetup(): string
    {
        return $this->setup;
    }


    public function getPunchline(): string
    {
        return $this->punchline;
    }

    public function getId(): int
    {
        return $this->id;
    }

}
