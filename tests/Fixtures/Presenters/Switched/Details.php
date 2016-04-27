<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Presenters\Presenter;

class Details extends Presenter
{
    public static $forenameTextBound = "";

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

    protected function createView()
    {
        $this->registerView(new DetailsView());
    }

    public function testChangingPresenterThroughEvent()
    {
        $this->raiseEvent("ChangePresenter", "Address");
    }
}
