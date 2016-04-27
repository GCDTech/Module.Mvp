<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Presenters\Presenter;

/**
 * A second step of a multi step test.
 */
class Complete extends Presenter
{
    protected function createView()
    {
        $this->registerView(new CompleteView());
    }
}
