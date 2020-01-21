<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Zed\Country\Business\CountryFacadeInterface as SprykerCountryFacadeInterface;

interface CountryFacadeInterface extends SprykerCountryFacadeInterface
{
    /**
     * @return void
     */
    public function importRegions(): void;

    /**
     * @param int $idCountry
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIdCountry(int $idCountry): CountryTransfer;

    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int;
}
