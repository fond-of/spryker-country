<?php

namespace FondOfSpryker\Zed\Country\Business;

use MissingRegionException;
use Spryker\Zed\Country\Business\RegionManager as SprykerRegionManager;

class RegionManager extends SprykerRegionManager implements RegionManagerInterface
{
    /**
     * @param string $iso2code
     *
     * @throws \MissingRegionException
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int
    {
        $query = $this->countryQueryContainer->queryRegionByIsoCode($iso2code);
        $region = $query->findOne();

        if (!$region) {
            throw new MissingRegionException();
        }

        return $region->getIdRegion();
    }
}
