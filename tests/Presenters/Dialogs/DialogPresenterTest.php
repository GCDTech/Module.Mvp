<?php

namespace Gcd\Mvp\Tests\Presenters\Dialogs;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Dialogs\DialogPresenter;

class DialogPresenterTest extends RhubarbTestCase
{
    public function testNameGetsDefaultOfClassName()
    {
        $dialog = new UnitTestDialogPresenter();

        $this->assertEquals("UnitTestDialog", $dialog->getName());
    }
}

class UnitTestDialogPresenter extends DialogPresenter
{
}
