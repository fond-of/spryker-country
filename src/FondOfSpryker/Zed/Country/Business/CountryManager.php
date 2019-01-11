<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\RegionTransfer;
use Spryker\Zed\Country\Business\CountryManager as SprykerCountryManager;
use Spryker\Zed\Country\Business\Exception\MissingCountryException;

class CountryManager extends SprykerCountryManager
{
    /**
     * @param string $iso2code
     *
     * @throws \Spryker\Zed\Country\Business\Exception\MissingCountryException
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIso2Code($iso2code)
    {
        $query = $this->countryQueryContainer->queryCountryByIso2Code($iso2code);
        $countryEntity = $query->findOne();

        if (!$countryEntity) {
            throw new MissingCountryException(sprintf('Country not found for country code: %s', $iso2code));
        }

        $countryTransfer = (new CountryTransfer())->fromArray($countryEntity->toArray(), true);

        foreach ($countryEntity->getSpyRegions() as $region) {
            $countryTransfer->addRegion((new RegionTransfer())->fromArray($region->toArray(), true));
        }
        
        return $countryTransfer;
    }

    /**
     * @param $idCountry
     *
     * @throws \Spryker\Zed\Country\Business\Exception\MissingCountryException
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIdCountry($idCountry): CountryTransfer
    {
        $query = $this->countryQueryContainer->queryCountryByIdCountry($idCountry);

        $countryEntity = $query->findOne();

        if (!$countryEntity) {
            throw new MissingCountryException(sprintf('Country not found for country id: %s', $idCountry));
        }

        $countryTransfer = (new CountryTransfer())->fromArray($countryEntity->toArray(), true);

        foreach ($countryEntity->getSpyRegions() as $region) {
            $countryTransfer->addRegion((new RegionTransfer())->fromArray($region->toArray(), true));
        }

        return $countryTransfer;
    }
}
