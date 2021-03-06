<?php

namespace Gcd\Mvp\Tests\Presenters\Controls\Selection;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Presenters\Controls\Selection\SelectionControlPresenter;
use Rhubarb\Stem\Collections\Collection;
use Rhubarb\Stem\Filters\Equals;
use Rhubarb\Stem\Repositories\MySql\Schema\Columns\MySqlEnumColumn;
use Rhubarb\Stem\Tests\Fixtures\User;

class SelectionControlPresenterTest extends RhubarbTestCase
{
    public function testItemCreation()
    {
        $presenter = new TestSelectionControlPresenter();

        $presenter->setSelectionItems(
            [
                "Item 1",
                "Item 2"
            ]
        );

        $items = $presenter->publicGetCurrentlyAvailableSelectionItems();

        $this->assertCount(2, $items);

        $this->assertEquals("Item 1", $items[0]->value);
        $this->assertEquals("Item 1", $items[0]->label);
        $this->assertEquals("Item 2", $items[1]->value);
        $this->assertEquals("Item 2", $items[1]->label);

        $presenter->setSelectionItems(
            [
                ["Value 1", "Item 1"],
                ["Value 2", "Item 2"],
                ["Item 3"],
                ["Value 4", [1, 2, 3]],
                [[4, 5, 6], [7, 8, 9]]
            ]
        );

        $items = $presenter->publicGetCurrentlyAvailableSelectionItems();

        $this->assertCount(5, $items);
        $this->assertEquals("Value 1", $items[0]->value);
        $this->assertEquals("Item 3", $items[2]->value);
        $this->assertEquals("Item 3", $items[2]->label);
        $this->assertCount(3, $items[3]->label);
        $this->assertEquals(2, $items[3]->label[1]);
        $this->assertEquals(5, $items[4]->value[1]);
        $this->assertEquals(8, $items[4]->label[1]);

        // Now enums
        $presenter->setSelectionItems(
            [
                new MySqlEnumColumn("TestField", "a", ["a", "b", "c"])
            ]
        );

        $items = $presenter->publicGetCurrentlyAvailableSelectionItems();

        $this->assertCount(3, $items);
        $this->assertEquals("a", $items[0]->value);
        $this->assertEquals("a", $items[0]->label);
        $this->assertEquals("c", $items[2]->value);
        $this->assertEquals("c", $items[2]->label);

        $user = new User();
        $user->Forename = "Albert";
        $user->Surname = "Smith";
        $user->Active = 0;
        $user->save();

        $user = new User();
        $user->Forename = "Bertie";
        $user->Surname = "O'Hern";
        $user->Active = 1;
        $user->save();

        $user = new User();
        $user->Forename = "Catherine";
        $user->Surname = "Clarke";
        $user->Active = 1;
        $user->save();

        // Test a collection
        $collection = new Collection(User::class);
        $collection->filter(new Equals("Active", 1));

        $presenter->setSelectionItems([$collection]);

        $items = $presenter->publicGetCurrentlyAvailableSelectionItems();

        $this->assertCount(2, $items);
        $this->assertEquals(2, $items[0]->value);
        $this->assertEquals("Bertie O'Hern", $items[0]->label);
        $this->assertEquals("Bertie O'Hern", $items[0]->data["FullName"]);
        $this->assertEquals(3, $items[1]->value);
        $this->assertEquals("Catherine Clarke", $items[1]->label);

    }
}

class TestSelectionControlPresenter extends SelectionControlPresenter
{
    public function publicGetCurrentlyAvailableSelectionItems()
    {
        return $this->getCurrentlyAvailableSelectionItems();
    }
}
