<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds;

use Gcd\Mvp\Presenters\Presenter;

class CrudsDetailsPresenter extends Presenter
{
    protected function createView()
    {
        return new CrudsDetailsView();
    }
}