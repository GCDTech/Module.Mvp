<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds;

use Gcd\Mvp\Presenters\HtmlPresenter;

class NormalPresenter extends HtmlPresenter
{
    public function createView()
    {
        return new NormalView();
    }
}