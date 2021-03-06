<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds2;

use Gcd\Mvp\Views\HtmlView;
use Rhubarb\Patterns\Mvp\Crud\ModelForm\ModelFormPresenter;

class Cruds2ItemPresenter extends ModelFormPresenter
{
    protected function createView()
    {
        return new HtmlView();
    }
}
