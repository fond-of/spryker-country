<?php

namespace FondOfSpryker\Zed\Country\Business;

use Spryker\Zed\Country\Business\RegionManagerInterface as SprykerRegionManager;

interface RegionManagerInterface extends SprykerRegionManager
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
