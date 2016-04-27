<?php

namespace Gcd\Mvp\Tests\UrlHandlers;

use Rhubarb\Crown\Request\WebRequest;
use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\UrlHandlers\MvpUrlHandler;

class MvpUrlHandlerTest extends RhubarbTestCase
{
    public function testHandlerLooksForPresenter()
    {
        // Check that MvpUrlHandler differs from NamespaceMappedUrlHandler in that it looks for "Presenter" at the end
        // of the class name.

        // Some silly namespace to test.
        $handler = new MvpUrlHandler('Gcd\Mvp\Tests\Fixtures\Presenters\Cruds');
        $handler->setUrl("/");

        $request = new WebRequest();
        $request->UrlPath = "/normal/";

        $response = $handler->generateResponse($request);

        $this->assertEquals('My New View', $response);
    }
}
