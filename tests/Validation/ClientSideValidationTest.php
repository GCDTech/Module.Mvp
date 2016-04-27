<?php

namespace Gcd\Mvp\Tests\Validation;

use Rhubarb\Crown\Tests\RhubarbTestCase;
use Gcd\Mvp\Validation\ClientSideValidation;
use Gcd\Mvp\Validation\EqualToClientSide;
use Rhubarb\Stem\Models\Validation\EqualTo;

class ClientSideValidationTest extends RhubarbTestCase
{
    public function testConversionFromModelToClientSide()
    {
        $equals = new EqualTo("Test", "Value");

        $clientEquals = ClientSideValidation::fromModelValidation($equals);

        $this->assertInstanceOf(EqualToClientSide::class, $clientEquals);
    }
}
