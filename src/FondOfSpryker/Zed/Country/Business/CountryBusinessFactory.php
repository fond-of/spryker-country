<?php

namespace FondOfSpryker\Zed\Country\Business;

use FondOfSpryker\Zed\Country\Business\Importer\Importer;
use FondOfSpryker\Zed\Country\Business\Importer\ImporterInterface;
use Spryker\Zed\Country\Business\CountryBusinessFactory as SprykerCountryBusinessFactory;
use Spryker\Zed\Country\Business\CountryManagerInterface;
use Spryker\Zed\Country\Business\RegionManagerInterface;

/**
 * @method \FondOfSpryker\Zed\Country\CountryConfig getConfig()
 * @method \Spryker\Zed\Country\Persistence\CountryRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface getQueryContainer()
 */
class CountryBusinessFactory extends SprykerCountryBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\Country\Business\Importer\ImporterInterface
     */
    public function createImporter(): ImporterInterface
    {
        return new Importer(
            $this->createCountryManager(),
            $this->createRegionManager(),
            $this->getConfig()
        );
    }

    /**
     * @return \Spryker\Zed\Country\Business\CountryManagerInterface
     */
    public function createCountryManager(): CountryManagerInterface
    {
        return new CountryManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Country\Business\RegionManagerInterface
     */
    public function createRegionManager(): RegionManagerInterface
    {
        return new RegionManager(
            $this->getQueryContainer()
        );
    }
}
