<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds;

use Gcd\Mvp\Views\View;

class NormalView extends View
{
    public function printViewContent()
    {
        print "My New View";
    }
}