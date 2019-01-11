<?php

namespace FondOfSpryker\Client\Country;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\Country\CountryFactory getFactory()
 */
class CountryClient extends AbstractClient implements CountryClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getRegionsByCountryTransfer(CountryTransfer $countryTransfer): CountryTransfer
    {
        return $this->getFactory()->createCountryStub()->findRegionsByIsoCodeAction($countryTransfer);
    }
}
