<?php

namespace Gcd\Mvp\Tests\Presenters\Controls;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Controls\ControlPresenter;
use Gcd\Mvp\Presenters\Controls\ControlView;

class ControlViewTest extends RhubarbTestCase
{
    public function testCssClass()
    {
        $mockView = new ControlMockView();

        $controlPresenter = new ControlPresenter();
        $controlPresenter->CssClassNames = ["billy-goat", "chicken"];
        $controlPresenter->attachMockView($mockView);
        $controlPresenter->generateResponse();

        $this->assertEquals(" class=\"billy-goat chicken\"", $mockView->publicGetClassTag());
    }
}

class UnitTestControl extends ControlPresenter
{
}

class ControlMockView extends ControlView
{
    public function publicGetClassTag()
    {
        return $this->getClassTag();
    }
}
