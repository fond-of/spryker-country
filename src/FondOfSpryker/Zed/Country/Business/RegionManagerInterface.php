<?php

namespace FondOfSpryker\Zed\Country\Business;

use Spryker\Zed\Country\Business\RegionManagerInterface as SprykerRegionManagerInterface;

interface RegionManagerInterface extends SprykerRegionManagerInterface
{
    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int;

    /**
     * @param string $isoCode
     *
     * @return bool
     */
    public function hasRegion($isoCode): bool;
}
