<?php

namespace FondOfSpryker\Client\Country;

use FondOfSpryker\Client\Country\Zed\CountryStub;
use FondOfSpryker\Client\Country\Zed\CountryStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class CountryFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\Country\Zed\CountryStubInterface
     */
    public function createCountryStub(): CountryStubInterface
    {
        return new CountryStub($this->getZedRequestClient());
    }

    /**
     * @throws
     *
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(CountryDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
