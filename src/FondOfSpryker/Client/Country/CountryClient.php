<?php

namespace FondOfSpryker\Client\Country;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\Country\CountryClient as SprykerCountryClient;

/**
 * @method \FondOfSpryker\Client\Country\CountryFactory getFactory()
 */
class CountryClient extends SprykerCountryClient implements CountryClientInterface
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

    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findCountryByIso2Code(CountryTransfer $countryTransfer): CountryTransfer
    {
        return $this->getFactory()->createCountryStub()->findCountryByIso2Code($countryTransfer);
    }
}
