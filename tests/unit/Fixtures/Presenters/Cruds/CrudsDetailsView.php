<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Cruds;

use Gcd\Mvp\Views\HtmlView;

class CrudsDetailsView extends HtmlView
{
    public function printViewContent()
    {
        print "The details view";
    }
}