<?php

namespace Gcd\Mvp\Tests\Views\Validation;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Tests\Fixtures\Presenters\Simple;
use Gcd\Mvp\Tests\Fixtures\Presenters\UnitTestView;
use Gcd\Mvp\Views\Validation\Placeholder;

class PlaceholderTest extends RhubarbTestCase
{
    public function testEmptyPlaceholder()
    {
        $mvp = new Simple();
        $view = new PlaceholderTestView();
        $mvp->attachMockView($view);

        $placeholder = new Placeholder("Forename", $view);

        $this->assertEquals("<em class=\"validation-placeholder\" name=\"ValidationPlaceHolder-Forename\"></em>", (string)$placeholder);
    }

    /*
     * Suspended while validation is in flux.
    public function testErrorPlaceholder()
    {
        $mvp = new Simple();
        $view = new PlaceholderTestView();

        $mvp->attachMockView( $view );

        $validator = new Validator();
        $validator->validations[] = new HasValue( "Forename" );

        $mvp->validate( $validator );

        $placeholder = new Placeholder( "Forename", $view );

        $this->assertEquals( "<em class=\"validation-placeholder\" name=\"ValidationPlaceHolder-Forename\">Forename must have a value</em>", (string) $placeholder );
    }
    */
}

class PlaceholderTestView extends UnitTestView
{
    public function setText($text)
    {

    }
}
