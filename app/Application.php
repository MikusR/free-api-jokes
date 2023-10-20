<?php

namespace app;

use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;
use App\Joke;

class Application
{

    public function run(): void
    {


        $menu = (new CliMenuBuilder)
            ->setTitle('Jokes')
            ->addItem('Show random general joke', function (CliMenu $menu) {
                echo $this->getJoke('general');
            })
            ->addItem('Show random programming joke', function (CliMenu $menu) {
                echo $this->getJoke('programming');
            })
            ->setWidth(70)
            ->setBackgroundColour('yellow')
            ->build();

        $menu->open();

    }

    public function getJoke(string $type): string
    {
        $joke = $this->fetchJoke($type);
        return $joke->getSetup()
            . "\n"
            . $joke->getPunchline()
            . "\n";
    }

    public function fetchJoke(string $type): Joke
    {
        $apiUrl = "https://official-joke-api.appspot.com/jokes/{$type}/random";
        $jsonFile = file_get_contents($apiUrl);
        $json = json_decode($jsonFile);
        $type = $json[0]->type;
        $setup = $json[0]->setup;
        $punchline = $json[0]->punchline;
        $id = $json[0]->id;
        return new Joke($type, $setup, $punchline, $id);

    }
}