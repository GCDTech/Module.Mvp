<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Presenters\ModelProvider;
use Gcd\Mvp\Presenters\Presenter;
use Gcd\Mvp\Presenters\SwitchedPresenter;

class UnitTestSwitchedPresenter extends SwitchedPresenter
{
    use ModelProvider;

    protected function getSwitchedPresenters()
    {
        return [
            "Details" => Details::class,
            "Address" => Address::class,
            "Thanks" => Thanks::class
        ];
    }

    private $details;

    protected function onPresenterAdded(Presenter $presenter)
    {
        parent::onPresenterAdded($presenter);

        if (is_a($presenter, Details::class)) {
            $this->details = $presenter;
        }
    }

    public function getDetailsPresenter()
    {
        return $this->details;
    }

    public function testPresenterIsChanged($presenterName)
    {
        $this->changePresenter($presenterName);
    }

    public function testGetDefaultPresenterName()
    {
        return $this->getDefaultPresenterName();
    }

    public function testGetCurrentPresenterName()
    {
        return $this->getCurrentPresenter();
    }

    protected function initialiseModel()
    {
        parent::initialiseModel();

        $this->model->Forename = "John";
    }
}
