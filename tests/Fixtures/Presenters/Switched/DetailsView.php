<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Views\View;

class DetailsView extends View
{
    public static $forename;

    public function createPresenters()
    {
        self::$forename = new UnitTestTextBox("Forename");

        $this->addPresenters(
            self::$forename
        );

        parent::createPresenters();
    }

    public function printViewContent()
    {
        print $this->presenters["Forename"];
    }
}
