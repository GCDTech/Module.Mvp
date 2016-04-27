<?php

namespace Gcd\Mvp\Presenters\Controls\Selection\CheckSetTable;

use Gcd\Mvp\Presenters\Controls\Selection\CheckSet\CheckSet;

/**
 * Horizontally oriented checkboxes
 */
class CheckSetTable extends CheckSet
{
    protected function createView()
    {
        return new CheckSetTableView();
    }
}
