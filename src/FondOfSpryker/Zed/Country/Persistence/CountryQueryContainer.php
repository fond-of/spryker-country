<?php

namespace FondOfSpryker\Zed\Country\Persistence;

use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Spryker\Zed\Country\Persistence\CountryQueryContainer as SprykerCountryQueryContainer;

/**
 * @method \Spryker\Zed\Country\Persistence\CountryPersistenceFactory getFactory()
 */
class CountryQueryContainer extends SprykerCountryQueryContainer implements CountryQueryContainerInterface
{
    public const COL_NAME = 'region_name';

    /**
     * @param string $iso2Code
     *
     * @return \Orm\Zed\Country\Persistence\SpyCountryQuery
     */
    public function queryCountryByIso2Code($iso2Code): SpyCountryQuery
    {
        $query = parent::queryCountryByIso2Code($iso2Code);

        $query->leftJoinSpyRegion();

        return $query;
    }

    /**
     * @param int $idCountry
     *
     * @return \Orm\Zed\Country\Persistence\SpyCountryQuery
     */
    public function queryCountryByIdCountry(int $idCountry): SpyCountryQuery
    {
        $query = $this->queryCountries();
        $query
            ->leftJoinSpyRegion()
            ->filterByIdCountry($idCountry);

        return $query;
    }
}
