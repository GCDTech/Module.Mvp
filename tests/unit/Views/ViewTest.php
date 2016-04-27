<?php

namespace Gcd\Mvp\Tests\Views;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Controls\Text\TextBox\TextBox;
use Gcd\Mvp\Tests\Fixtures\Presenters\SimpleView;

class ViewTest extends RhubarbTestCase
{
    public function testAddPresenterRaisesEvent()
    {
        $addedPresenter = null;

        $view = new SimpleView();
        $view->attachEventHandler("OnPresenterAdded", function ($presenter) use (&$addedPresenter) {
            $addedPresenter = $presenter;
        });

        $view->addPresenters(new TextBox("TestBox"));

        $this->assertNotNull($addedPresenter);
        $this->assertInstanceOf(TextBox::class, $addedPresenter);
    }
}
