<?php

namespace app;

use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;

class Application
{

    public function run(): void
    {
        $itemCallable = function (CliMenu $menu) {
            echo $menu->getSelectedItem()->getText();
        };

        $menu = (new CliMenuBuilder)
            ->setTitle('CLI Menu')
            ->addItem('First Item', $itemCallable)
            ->addItem('Second Item', $itemCallable)
            ->addLineBreak('-')
            ->addSubMenu('Options', function (CliMenuBuilder $b) {
                $b->setTitle('CLI Menu > Options')
                    ->addItem('First option', function (CliMenu $menu) {
                        echo sprintf('Executing option: %s', $menu->getSelectedItem()->getText());
                    })
                    ->addLineBreak('-');
            })
            ->setWidth(70)
            ->setBackgroundColour('yellow')
            ->build();

        $menu->open();
    }

}