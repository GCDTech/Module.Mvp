<?php

namespace Gcd\Mvp\Presenters\Application\Table\FooterProviders;

use Gcd\Mvp\Presenters\Application\Table\Table;

/**
 * A simple abstract to implement if you want a table footer.
 *
 */
abstract class FooterProvider
{
    /**
     * @var Table
     */
    protected $table;

    public abstract function printFooter();

    public function setTable($table)
    {
        $this->table = $table;
    }
}