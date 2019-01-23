<?php

namespace FondOfSpryker\Zed\Country\Persistence;

use Spryker\Zed\Country\Persistence\CountryQueryContainer as SprykerCountryQueryContainer;

/**
 * @method \Spryker\Zed\Country\Persistence\CountryPersistenceFactory getFactory()
 */
class CountryQueryContainer extends SprykerCountryQueryContainer
{
    const COL_NAME = 'region_name';

    public function queryCountryByIso2Code($iso2Code)
    {
        $query = $this->queryCountries();
        $query
            ->leftJoinSpyRegion()
            ->filterByIso2Code($iso2Code);

        return $query;
    }

    /**
     * @param $idCountry
     *
     * @return \Orm\Zed\Country\Persistence\SpyCountryQuery
     */
    public function queryCountryByIdCountry($idCountry)
    {
        $query = $this->queryCountries();
        $query
            ->leftJoinSpyRegion()
            ->filterByIdCountry($idCountry);

        return $query;
    }
}
