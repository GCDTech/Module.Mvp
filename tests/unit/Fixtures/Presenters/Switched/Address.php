<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Presenters\Presenter;
use Gcd\Mvp\Tests\Fixtures\Presenters\TestView;

class Address extends Presenter
{
    protected function createView()
    {
        $this->registerView(new TestView());
    }

    public $restModel;
    public $restCollection;

    public function setRestModel($restObject)
    {
        $this->restModel = $restObject;
    }

    public function setRestCollection($restCollection)
    {
        $this->restCollection = $restCollection;
    }
}
