<?php

namespace FondOfSpryker\Client\Country;

use FondOfSpryker\Client\Country\Zed\CountryStub;
use FondOfSpryker\Client\Country\Zed\CountryStubInterface;
use Spryker\Client\Country\CountryFactory as SprykerCountryFactory;

class CountryFactory extends SprykerCountryFactory
{
    /**
     * @return \FondOfSpryker\Client\Country\Zed\CountryStubInterface
     */
    public function createCountryStub(): CountryStubInterface
    {
        return new CountryStub($this->getZedRequestClient());
    }
}
