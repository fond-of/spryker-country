<?php

namespace FondOfSpryker\Zed\Country;

use Spryker\Zed\Country\CountryConfig as SprykerCountryConfig;

class CountryConfig extends SprykerCountryConfig
{
    /**
     * @return \Spryker\Zed\Country\Business\Internal\Regions\RegionInstallInterface[]
     */
    public function getRegionInstallerCollection(): array
    {
        return [];
    }
}
