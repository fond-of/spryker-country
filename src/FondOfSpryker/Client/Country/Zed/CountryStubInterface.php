<?php

namespace FondOfSpryker\Client\Country\Zed;

use Generated\Shared\Transfer\CountryTransfer;

interface CountryStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findRegionsByIsoCodeAction(CountryTransfer $countryTransfer): CountryTransfer;

    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findCountryByIso2Code(CountryTransfer $countryTransfer): CountryTransfer;
}
