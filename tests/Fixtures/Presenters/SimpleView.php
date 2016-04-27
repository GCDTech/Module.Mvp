<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Presenters\Controls\Text\TextBox\TextBox;
use Gcd\Mvp\Views\View;

class SimpleView extends View implements ISimpleView
{
    private $text;

    public function printViewContent()
    {
        print $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function createPresenters()
    {
        parent::createPresenters();

        $this->addPresenters(
            [
                "ForenameA" => new TextBox("Forename"),
                "ForenameB" => new TextBox("Forename")
            ]
        );
    }

}
