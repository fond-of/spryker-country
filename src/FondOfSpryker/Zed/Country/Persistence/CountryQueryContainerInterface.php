<?php

namespace FondOfSpryker\Zed\Country\Persistence;

use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Spryker\Zed\Country\Persistence\CountryQueryContainerInterface as SprykerCountryQueryContainerInterface;

interface CountryQueryContainerInterface extends SprykerCountryQueryContainerInterface
{
    /**
     * @param int $idCountry
     *
     * @throws
     *
     * @return \Orm\Zed\Country\Persistence\SpyCountryQuery
     */
    public function queryCountryByIdCountry(int $idCountry): SpyCountryQuery;
}
