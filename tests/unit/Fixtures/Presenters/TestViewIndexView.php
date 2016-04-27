<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters;

use Gcd\Mvp\Views\HtmlView;

class TestViewIndexView extends HtmlView
{
    public function createPresenters()
    {
        parent::createPresenters();

        $this->addPresenters(
            new TestCompositePresenter("Test")
        );
    }

    protected function printViewContent()
    {
        $this->presenters["Test"]->displayWithIndex(0);
        $this->presenters["Test"]->displayWithIndex(1);
    }
}