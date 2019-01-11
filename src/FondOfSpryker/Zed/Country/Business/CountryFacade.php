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
     * @return void;
     */
    public function importRegions()
    {
        $this->getFactory()->createImporter()->importRegions();
    }

    /**
     * @param string $iso2Code
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIso2Code($iso2Code): CountryTransfer
    {
        return $this->getFactory()->createCountryManager()->getCountryByIso2Code($iso2Code);
    }

    /**
     * @param $idCountry
     *
     * @return mixed
     */
    public function getCountryByIdCountry($idCountry)
    {
        return $this->getFactory()->createCountryManager()->getCountryByIdCountry($idCountry);
    }
}
