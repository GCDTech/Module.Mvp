<?php

namespace Gcd\Mvp\Tests\Presenters\Controls\Selection\DropDown;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Controls\Selection\DropDown\DropDown;

class DropDownTest extends RhubarbTestCase
{
    public function testDropDownReturnsHtmlCorrectly()
    {
        $dropDown = new DropDown("Type");
        $dropDown->setSelectionItems(["a", ["b", "bertie"], "c"]);

        $selectedItem = new \stdClass();
        $selectedItem->value = "b";

        $dropDown->model->SelectedItems = [$selectedItem];

        $html = $dropDown->generateResponse();

        $this->assertEquals('    <select name="Type" id="Type"
            presenter-name="Type">
        <option value="a" data-item="{&quot;value&quot;:&quot;a&quot;,&quot;label&quot;:&quot;a&quot;,&quot;data&quot;:[]}">a</option>
<option value="b" selected="selected" data-item="{&quot;value&quot;:&quot;b&quot;,&quot;label&quot;:&quot;bertie&quot;,&quot;data&quot;:[]}">bertie</option>
<option value="c" data-item="{&quot;value&quot;:&quot;c&quot;,&quot;label&quot;:&quot;c&quot;,&quot;data&quot;:[]}">c</option>
        </select>', $html);
    }
}
