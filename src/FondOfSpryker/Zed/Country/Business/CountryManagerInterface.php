<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Zed\Country\Business\CountryManagerInterface as SprykerCountryManagerInterface;

interface CountryManagerInterface extends SprykerCountryManagerInterface
{
    /**
     * @param int $idCountry
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIdCountry(int $idCountry): CountryTransfer;
}
