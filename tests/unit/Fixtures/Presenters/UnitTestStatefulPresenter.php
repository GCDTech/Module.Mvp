<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Presenters\Presenter;

class UnitTestStatefulPresenter extends Presenter
{
    protected function createView()
    {
        $this->registerView(new TestView());
    }
}
