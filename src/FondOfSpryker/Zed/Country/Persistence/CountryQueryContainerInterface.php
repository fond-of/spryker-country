<?php

namespace FondOfSpryker\Zed\Country\Persistence;

use Orm\Zed\Country\Persistence\SpyCountryQuery;
use Spryker\Zed\Country\Persistence\CountryQueryContainerInterface as SprykerCountryQueryContainerInterface;

interface CountryQueryContainerInterface extends SprykerCountryQueryContainerInterface
{
    /**
     * @param  int  $idCountry
     * @return \Orm\Zed\Country\Persistence\SpyCountryQuery
     *
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function queryCountryByIdCountry(int $idCountry): SpyCountryQuery;
}
