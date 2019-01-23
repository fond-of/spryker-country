<?php

namespace FondOfSpryker\Zed\Country\Business;

interface CountryFacadeInterface
{
    /**
     * @return void
     */
    public function importRegions();

    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int;
}
