<?php

namespace Gcd\Mvp\Tests\Presenters\ Application\Tabs;

use Rhubarb\Crown\Request\WebRequest;
use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Application\Tabs\TabDefinition;
use Gcd\Mvp\Presenters\Application\Tabs\TabsPresenter;
use Gcd\Mvp\Presenters\Application\Tabs\TabsView;

class TabsPresenterTest extends RhubarbTestCase
{
    public function testTabDefinitionsAreSet()
    {
        $tabs = new TabsPresenter();
        $tabs->setTabDefinitions(
            ["Tab 1" => 1, "Tab 2" => 2]
        );

        $this->assertEquals(
            ["Tab 1" => 1, "Tab 2" => 2], $tabs->getTabDefinitions()
        );

        $tabs->setTabDefinitions(
            ["Tab 1" => 1, new TabDefinition("Tab 2", ["size" => "big", "colour" => "red"])]
        );

        $view = new UnitTestingTabsView();
        $tabs->attachMockView($view);
        $tabs->generateResponse(new WebRequest());

        $this->assertEquals(
            [
                new TabDefinition("Tab 1", 1),
                new TabDefinition("Tab 2", ["size" => "big", "colour" => "red"])
            ], $view->getInflatedTabs()
        );
    }
}

class UnitTestingTabsView extends TabsView
{
    public function getInflatedTabs()
    {
        return $this->tabs;
    }
}
