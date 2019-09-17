<?php

namespace FondOfSpryker\Zed\Country\Business;

use FondOfSpryker\Zed\Country\Business\Exception\MissingRegionException;
use FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface;
use Spryker\Zed\Country\Business\RegionManager as SprykerRegionManager;

class RegionManager extends SprykerRegionManager implements RegionManagerInterface
{
    /**
     * @var \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface
     */
    protected $countryQueryContainer;

    /**
     * @param \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface $countryQueryContainer
     */
    public function __construct(CountryQueryContainerInterface $countryQueryContainer)
    {
        parent::__construct($countryQueryContainer);
    }

    /**
     * @param string $iso2code
     *
     * @throws \FondOfSpryker\Zed\Country\Business\Exception\MissingRegionException
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int
    {
        $query = $this->countryQueryContainer->queryRegionByIsoCode($iso2code);
        $region = $query->findOne();

        if (!$region) {
            throw new MissingRegionException(sprintf('There is no region for "%s".', $iso2code));
        }

        return $region->getIdRegion();
    }

    /**
     * @param string $isoCode
     *
     * @return bool
     */
    public function hasRegion($isoCode): bool
    {
        return parent::hasRegion($isoCode);
    }
}
