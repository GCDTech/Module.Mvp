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

namespace Gcd\Mvp\Presenters\Controls;

require_once __DIR__ . "/../../Views/SpawnableByViewBridgeView.php";

use Gcd\Mvp\Views\SpawnableByViewBridgeView;

class ControlView extends SpawnableByViewBridgeView
{
    public $cssClassNames = [];
    public $htmlAttributes = [];

    protected function getClassTag()
    {
        if (sizeof($this->cssClassNames)) {
            return " class=\"" . implode(" ", $this->cssClassNames) . "\"";
        }

        return "";
    }

    protected function getHtmlAttributeTags()
    {
        if (sizeof($this->htmlAttributes)) {
            $attributes = [];

            foreach ($this->htmlAttributes as $key => $value) {
                $attributes[] = $key . "=\"" . htmlentities($value) . "\"";
            }

            return " " . implode(" ", $attributes);
        }

        return "";
    }
}
