<?php

namespace Gcd\Mvp\Tests\Presenters\Controls\Buttons;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Controls\Buttons\Button;

class ButtonTest extends RhubarbTestCase
{
    public function testButtonPressedEventIsPassedThroughConstructor()
    {
        $trigger = false;

        $button = new Button("TestButton", "Any Text", function () use (&$trigger) {
            $trigger = true;
        });

        $button->simulateButtonPress();

        $this->assertTrue($trigger);
    }
}