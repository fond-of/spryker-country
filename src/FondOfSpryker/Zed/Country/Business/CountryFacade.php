<?php

namespace FondOfSpryker\Zed\Country\Business;

use Spryker\Zed\Country\Business\CountryFacade as SprykerCountryFacade;
use FondOfSpryker\Zed\Country\Business\CountryFacadeInterface;

/**
 * @method \FondOfSpryker\Zed\Country\Business\CountryBusinessFactory getFactory()
 */
class CountryFacade extends SprykerCountryFacade implements CountryFacadeInterface
{
    /**
     * @return void;
     */
    public function importRegions()
    {
        $this->getFactory()->createImporter()->importRegions();
    }


    public function getCountryByIso2Code($iso2Code)
    {
        return $this->getFactory()->createCountryManager()->getCountryByIso2Code($iso2Code);
    }

    public function getCountryByIdCountry($idCountry)
    {
        return $this->getFactory()->createCountryManager()->getCountryByIdCountry($idCountry);
    }
}
