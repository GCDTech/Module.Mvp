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

namespace Gcd\Mvp\Presenters\Forms;

require_once __DIR__ . "/Form.php";
require_once __DIR__ . "/../CreatePresentersFromSchemaTrait.php";

use Rhubarb\Crown\Request\Request;
use Gcd\Mvp\Presenters\CreatePresentersFromSchemaTrait;

/**
 * Provides an automatic way for a form to get the model object provided by the MvpRestHandler
 *
 * Also replaces data bindings so that the rest supplied model is bound to instead.
 *
 */
abstract class MvpRestBoundForm extends Form
{
    use CreatePresentersFromSchemaTrait;

    /**
     * The Model supplied by the RestHandler
     *
     * @var \Rhubarb\Stem\Models\Model
     */
    protected $restModel;

    /**
     * The Collection supplied by the RestHandler
     *
     * @var \Rhubarb\Stem\Collections\Collection
     */
    protected $restCollection;

    public function setRestModel($restModel)
    {
        $this->restModel = $restModel;

        // Add the unique identifier to the presenter model. This allows validation, which only uses the
        // presenter model to access the rest model unique identifier for doing duplication checks for example.
        $this->model->RestModelUniqueIdentifier = $restModel->UniqueIdentifier;
    }

    public function getRestModel()
    {
        return $this->restModel;
    }

    public function isConfigured()
    {
        // As the rest model data is sucked into the form's model, this stops the configured state
        // being flagged.
        return false;
    }

    public function getXmlRpcUrl()
    {
        $request = Request::current();
        return $request->urlPath;
    }

    public function setRestCollection($restCollection)
    {
        $this->restCollection = $restCollection;
    }

    public function getRestCollection()
    {
        return $this->restCollection;
    }

    /**
     * Updates the model with data bound to a sub presenter.
     *
     * @param string $dataKey
     * @param $data
     */
    protected function setDataFromPresenter($dataKey, $data, $viewIndex = false)
    {
        $this->setData($dataKey, $data, $viewIndex);
    }

    protected function setData($dataKey, $data, $viewIndex = false)
    {
        $restModel = $this->getRestModel();

        if ($viewIndex) {
            if ($restModel) {
                if (!isset($restModel[$dataKey])) {
                    $restModel[$dataKey] = [];
                }

                $existingData = $restModel[$dataKey];
                $existingData[$viewIndex] = $data;

                $restModel[$dataKey] = $existingData;
            }

            if (!isset($this->model[$dataKey])) {
                $this->model[$dataKey] = [];
            }

            $existingData = $this->model[$dataKey];
            $existingData[$viewIndex] = $data;

            $this->model[$dataKey] = $existingData;
        } else {
            if ($restModel) {
                $restModel[$dataKey] = $data;
            }

            $this->model[$dataKey] = $data;
        }
    }

    /**
     * Provides model data to the requesting presenter.
     *
     * @param string $dataKey
     * @param bool $viewIndex
     * @return null
     */
    protected function getDataForPresenter($dataKey, $viewIndex = false)
    {
        return $this->getData($dataKey, $viewIndex);
    }

    protected function getData($dataKey, $viewIndex = false)
    {
        $data = null;

        if (isset($this->model[$dataKey])) {
            $data = $this->model[$dataKey];
        } else {
            $restModel = $this->getRestModel();

            if (isset($restModel[$dataKey])) {
                $data = $restModel[$dataKey];
            }
        }

        if ($viewIndex && $data !== null && is_array($data)) {
            if (isset($data[$viewIndex])) {
                $data = $data[$viewIndex];
            } else {
                $data = null;
            }
        }

        return $data;
    }

    protected function getModel()
    {
        return $this->restModel;
    }
}