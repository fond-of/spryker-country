<?php

namespace FondOfSpryker\Zed\Country\Business;

use FondOfSpryker\Zed\Country\Business\CountryManager;
use FondOfSpryker\Zed\Country\Business\Importer\Importer;
use Spryker\Zed\Country\Business\CountryBusinessFactory as SprykerCountryBusinessFactory;
use Spryker\Zed\Country\Business\RegionManager;

/**
* @method \FondOfSpryker\Zed\Country\CountryConfig getConfig()
* @method \Spryker\Zed\Country\Persistence\CountryRepositoryInterface getRepository()
* @method \Spryker\Zed\Country\Persistence\CountryQueryContainerInterface getQueryContainer()
*/
class CountryBusinessFactory extends SprykerCountryBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\Country\Business\Importer\Importer
     */
    public function createImporter()
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
    public function createCountryManager()
    {
        return new CountryManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Country\Business\RegionManagerInterface
     */
    protected function createRegionManager()
    {
        return new RegionManager(
            $this->getQueryContainer()
        );
    }
}