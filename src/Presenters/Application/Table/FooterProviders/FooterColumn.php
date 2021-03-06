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

namespace Gcd\Mvp\Presenters\Application\Table\FooterProviders;

use Gcd\Mvp\Presenters\Application\Table\Table;

abstract class FooterColumn
{
    protected $span = 1;

    protected $cssClasses = [];

    public function __construct($span = 1)
    {
        $this->span = $span;
    }

    public function addCssClass($className)
    {
        $this->cssClasses[] = $className;
    }

    public function getCssClasses()
    {
        return $this->cssClasses;
    }

    public function getSpan()
    {
        return $this->span;
    }

    public abstract function getCellValue(Table $table);
}