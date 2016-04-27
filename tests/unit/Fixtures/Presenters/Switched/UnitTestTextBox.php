<?php

namespace Gcd\Mvp\Tests\Fixtures\Presenters\Switched;

use Gcd\Mvp\Presenters\Controls\Text\TextBox\TextBox;

class UnitTestTextBox extends TextBox
{
    protected function applyModelToView()
    {
        parent::applyModelToView();

        self::$textBoxValue = $this->model->Text;
    }

    public static $textBoxValue = "";
}
