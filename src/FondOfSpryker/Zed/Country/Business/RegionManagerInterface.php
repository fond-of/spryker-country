<?php

namespace FondOfSpryker\Zed\Country\Business;

interface RegionManagerInterface
{
    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int;
}
