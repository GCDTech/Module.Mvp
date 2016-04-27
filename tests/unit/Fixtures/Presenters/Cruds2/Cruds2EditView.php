<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds2;

use Gcd\Mvp\Views\View;

class Cruds2EditView extends View
{
    protected function printViewContent()
    {
        $user = $this->raiseEvent("GetRestModel");

        print $user->Forename;
    }
}
