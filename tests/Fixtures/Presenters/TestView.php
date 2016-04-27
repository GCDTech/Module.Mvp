<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Views\HtmlView;

class TestView extends HtmlView
{
    public function __construct($requireContainer = true, $requireState = true)
    {
        $this->requiresContainer = $requireContainer;
        $this->requiresStateInputs = $requireState;
    }

    public function testRaiseEventOnViewBridge()
    {
        $this->raiseEventOnViewBridge("TestEvent", 123, 234);
    }

    public function printViewContent()
    {
        print "Dummy Output";
    }
}
