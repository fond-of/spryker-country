<?php
namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryCollectionTransfer;
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

    /**
     * @param \Generated\Shared\Transfer\CountryCollectionTransfer $countryCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CountryCollectionTransfer
     */
    public function findCountriesByIso2Codes(CountryCollectionTransfer $countryCollectionTransfer): CountryCollectionTransfer
    {
        return $this->getFactory()
            ->createCountryReader()
            ->findCountriesByIso2Codes($countryCollectionTransfer);
    }

    /**
     * @param string $iso2code
     *
     * @return int
     */
    public function getIdRegionByIso2Code(string $iso2code): int
    {
        return $this->getFactory()->createRegionManager()->getIdRegionByIso2Code($iso2code);
    }
}
