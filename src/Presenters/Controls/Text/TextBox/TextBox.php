<?php

/*
 *	Copyright 2015 RhubarbPHP
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

namespace Gcd\Mvp\Presenters\Controls\Text\TextBox;

require_once __DIR__ . "/../../ControlPresenter.php";

use Rhubarb\Crown\Request\Request;
use Gcd\Mvp\Presenters\Controls\ControlPresenter;

/**
 * @property TextBoxView $view
 */
class TextBox extends ControlPresenter
{
    protected $size = 40;
    protected $maxLength;
    protected $allowBrowserAutoComplete = true;
    protected $defaultValue = "";
    protected $placeholderText = "";
    protected $inputHtmlType;

    public function __construct($name = "", $size = 40, $inputHtmlType = 'text')
    {
        parent::__construct($name);

        $this->size = $size;
        $this->inputHtmlType = $inputHtmlType;
    }

    /**
     * @param string $defaultValue
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        if (!$this->Text) {
            $this->Text = $this->defaultValue;
        }
    }

    /**
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @param string $placeholderText
     */
    public function setPlaceholderText($placeholderText)
    {
        $this->placeholderText = $placeholderText;
    }

    /**
     * @return string
     */
    public function getPlaceholderText()
    {
        return $this->placeholderText;
    }

    protected function createView()
    {
        return new TextBoxView($this->inputHtmlType);
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function setMaxLength($length)
    {
        $this->maxLength = $length;

        return $this;
    }

    public function setAllowBrowserAutoComplete($allowBrowserAutoComplete)
    {
        $this->allowBrowserAutoComplete = $allowBrowserAutoComplete;
    }

    protected function applyBoundData($data)
    {
        if ($data === null) {
            $data = $this->defaultValue;
        }

        $this->model->Text = $data;
    }

    protected function extractBoundData()
    {
        return $this->model->Text;
    }

    protected function applyModelToView()
    {
        parent::applyModelToView();

        $this->view->setText($this->model->Text);
        $this->view->setSize($this->size);
        $this->view->setPlaceholderText($this->placeholderText);
        $this->view->setAllowBrowserAutoComplete($this->allowBrowserAutoComplete);

        if ($this->maxLength) {
            $this->view->setMaxLength($this->maxLength);
        }
    }

    protected function parseRequestForCommand()
    {
        $request = Request::current();
        $text = $request->post($this->getIndexedPresenterPath());

        if ($text !== null) {
            $this->model->Text = $text;
            $this->setBoundData();
        }
    }

    protected function initialiseModel()
    {
        parent::initialiseModel();

        $this->model->Text = "";
    }
}
