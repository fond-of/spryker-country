<?php

namespace FondOfSpryker\Client\Country;

use Generated\Shared\Transfer\CountryTransfer;

interface CountryClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getRegionsByCountryTransfer(CountryTransfer $countryTransfer): CountryTransfer;
}
