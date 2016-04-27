<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Presenters\Controls\CompositeControlPresenter;

class TestCompositePresenter extends CompositeControlPresenter
{
    protected function createView()
    {
        return new TestCompositeView();
    }
}