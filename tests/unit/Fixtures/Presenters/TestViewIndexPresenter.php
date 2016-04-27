<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Presenters\Forms\Form;

class TestViewIndexPresenter extends Form
{
    protected function createView()
    {
        return new TestViewIndexView();
    }
}