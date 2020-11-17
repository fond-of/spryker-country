<?php

namespace FondOfSpryker\Client\Country\Zed;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\Country\Zed\CountryStubInterface as BaseCountryStubInterface;

interface CountryStubInterface extends BaseCountryStubInterface
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
