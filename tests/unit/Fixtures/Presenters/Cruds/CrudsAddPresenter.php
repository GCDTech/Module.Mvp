<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds;

use Gcd\Mvp\Views\HtmlView;
use Rhubarb\Patterns\Mvp\Crud\ModelForm\ModelFormPresenter;

class CrudsAddPresenter extends ModelFormPresenter
{
    protected function createView()
    {
        return new HtmlView();
    }
}
