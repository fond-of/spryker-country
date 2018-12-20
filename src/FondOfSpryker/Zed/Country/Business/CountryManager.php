<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryCollectionTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\RegionTransfer;
use Orm\Zed\Country\Persistence\SpyCountry;
use Spryker\Zed\Country\Business\Exception\CountryExistsException;
use Spryker\Zed\Country\Business\Exception\MissingCountryException;
use Spryker\Zed\Country\Persistence\CountryQueryContainerInterface;
use Spryker\Zed\Country\Business\CountryManager as SprykerCountryManager;

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


    public function getCountryByIdCountry($idCountry)
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
