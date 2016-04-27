<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Presenters\Presenter;
use Gcd\Mvp\Tests\Fixtures\Presenters\TestView;

class Thanks extends Presenter
{
    protected function createView()
    {
        $this->registerView(new TestView());
    }
}
