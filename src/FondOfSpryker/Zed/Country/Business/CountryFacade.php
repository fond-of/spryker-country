<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Zed\Country\Business\CountryFacade as SprykerCountryFacade;

/**
 * @method \FondOfSpryker\Zed\Country\Business\CountryBusinessFactory getFactory()
 */
class CountryFacade extends SprykerCountryFacade implements CountryFacadeInterface
{
    /**
     * @return void
     */
    public function importRegions(): void
    {
        $this->getFactory()->createImporter()->importRegions();
    }

    /**
     * @param int $idCountry
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIdCountry(int $idCountry): CountryTransfer
    {
        /** @var \FondOfSpryker\Zed\Country\Business\CountryManagerInterface $countryManager */
        $countryManager = $this->getFactory()->createCountryManager();

        return $countryManager->getCountryByIdCountry($idCountry);
    }

    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int
    {
        /** @var \FondOfSpryker\Zed\Country\Business\RegionManagerInterface $regionManager */
        $regionManager = $this->getFactory()->createRegionManager();

        return $regionManager->getIdRegionByIso2Code($iso2code);
    }
}
